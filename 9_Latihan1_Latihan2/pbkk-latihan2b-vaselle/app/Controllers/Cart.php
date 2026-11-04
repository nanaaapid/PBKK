<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Cart extends BaseController
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];
        $items = [];
        $total = 0;

        $model = new ProductModel();

        foreach ($cart as $productId => $quantity) {
            $product = $model->find($productId);

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

        return view('cart/index', [
            'title' => 'Shopping Cart',
            'items' => $items,
            'total' => $total
        ]);
    }

    public function add()
    {
        $productId = (int) $this->request->getPost('product_id');
        $quantity = (int) ($this->request->getPost('quantity') ?? 1);

        if ($quantity < 1) {
            return redirect()->back()
                ->with('error', 'Jumlah produk tidak valid!');
        }

        $product = (new ProductModel())
            ->where('aktif', 1)
            ->find($productId);

        if (!$product) {
            return redirect()->back()
                ->with('error', 'Produk tidak ditemukan!');
        }

        $cart = session()->get('cart') ?? [];
        $currentQuantity = $cart[$productId] ?? 0;

        if ($currentQuantity + $quantity > $product['stok']) {
            return redirect()->back()
                ->with('error', 'Jumlah melebihi stok tersedia!');
        }

        $cart[$productId] = $currentQuantity + $quantity;

        session()->set('cart', $cart);

        return redirect()->to('/cart')
            ->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function update()
    {
        $quantities = $this->request->getPost('quantities') ?? [];
        $cart = session()->get('cart') ?? [];

        $model = new ProductModel();

        foreach ($quantities as $productId => $quantity) {
            $productId = (int) $productId;
            $quantity = (int) $quantity;

            if (!isset($cart[$productId])) {
                continue;
            }

            if ($quantity <= 0) {
                unset($cart[$productId]);
                continue;
            }

            $product = $model->find($productId);

            if (!$product || $quantity > $product['stok']) {
                return redirect()->to('/cart')
                    ->with('error', 'Jumlah melebihi stok tersedia!');
            }

            $cart[$productId] = $quantity;
        }

        session()->set('cart', $cart);

        return redirect()->to('/cart')
            ->with('success', 'Keranjang berhasil diperbarui!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart') ?? [];

        unset($cart[$id]);

        session()->set('cart', $cart);

        return redirect()->to('/cart')
            ->with('success', 'Produk dihapus dari keranjang!');
    }
}