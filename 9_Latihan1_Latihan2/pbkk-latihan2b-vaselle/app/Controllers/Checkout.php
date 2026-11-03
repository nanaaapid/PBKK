<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\OrderModel;

class Checkout extends BaseController
{
    private function getCartItems()
    {
        $cart = session()->get('cart') ?? [];
        $items = [];
        $total = 0;

        $model = new ProductModel();

        foreach ($cart as $productId => $quantity) {
            $product = $model
                ->where('aktif', 1)
                ->find($productId);

            if (!$product) {
                continue;
            }

            $subtotal = $product['harga'] * $quantity;

            $items[] = [
                'product' => $product,
                'quantity' => $quantity,
                'subtotal' => $subtotal
            ];

            $total += $subtotal;
        }

        return [$items, $total];
    }

    public function index()
    {
        [$items, $total] = $this->getCartItems();

        if (empty($items)) {
            return redirect()->to('/cart')
                ->with('error', 'Keranjang masih kosong!');
        }

        return view('checkout/index', [
            'title' => 'Checkout',
            'items' => $items,
            'total' => $total
        ]);
    }

    public function placeOrder()
    {
        $rules = [
            'nama_penerima' => 'required|max_length[100]',
            'no_hp' => 'required|max_length[20]',
            'alamat' => 'required',
            'metode_pembayaran' => 'required|in_list[Transfer Bank (Simulasi),COD]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        [$items, $total] = $this->getCartItems();

        if (empty($items)) {
            return redirect()->to('/cart')
                ->with('error', 'Keranjang masih kosong!');
        }

        $db = \Config\Database::connect();
        $db->transBegin();

        try {
            // Periksa stok sebelum membuat pesanan.
            foreach ($items as $item) {
                $product = (new ProductModel())->find(
                    $item['product']['id']
                );

                if (
                    !$product ||
                    !$product['aktif'] ||
                    $product['stok'] < $item['quantity']
                ) {
                    throw new \RuntimeException(
                        'Stok produk ' . $item['product']['nama_produk'] .
                        ' tidak mencukupi.'
                    );
                }
            }

            $nomorPesanan = 'VS-' . date('Ymd') . '-' .
                strtoupper(bin2hex(random_bytes(4)));

            $db->table('orders')->insert([
                'user_id' => session()->get('user_id'),
                'nomor_pesanan' => $nomorPesanan,
                'nama_penerima' => $this->request->getPost('nama_penerima'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat'),
                'catatan' => $this->request->getPost('catatan'),
                'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
                'status' => 'Menunggu Konfirmasi',
                'total_harga' => $total
            ]);

            $orderId = $db->insertID();

            foreach ($items as $item) {
                $product = $item['product'];
                $quantity = (int) $item['quantity'];

                $db->table('order_items')->insert([
                    'order_id' => $orderId,
                    'product_id' => $product['id'],
                    'nama_produk' => $product['nama_produk'],
                    'harga' => $product['harga'],
                    'jumlah' => $quantity,
                    'subtotal' => $item['subtotal']
                ]);

                $db->table('products')
                    ->set('stok', 'stok - ' . $quantity, false)
                    ->where('id', $product['id'])
                    ->where('stok >=', $quantity)
                    ->update();

                if ($db->affectedRows() !== 1) {
                    throw new \RuntimeException(
                        'Stok produk berubah. Silakan ulangi checkout.'
                    );
                }
            }

            if (!$db->transStatus()) {
                throw new \RuntimeException('Transaksi gagal disimpan.');
            }

            $db->transCommit();

            session()->set('cart', []);

            return redirect()->to('/orders/' . $orderId)
                ->with('success', 'Pesanan berhasil dibuat!');

        } catch (\Throwable $e) {
            $db->transRollback();

            return redirect()->to('/cart')
                ->with('error', $e->getMessage());
        }
    }
}