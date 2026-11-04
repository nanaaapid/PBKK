<?php

namespace App\Controllers;

use App\Models\ProductModel;

class AdminProduct extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        return view('admin/products/index', [
            'title' => 'Kelola Produk',
            'products' => $this->productModel
                ->orderBy('created_at', 'DESC')
                ->findAll()
        ]);
    }

    public function create()
    {
        return view('admin/products/create', [
            'title' => 'Tambah Produk'
        ]);
    }

    private function uploadFoto()
    {
        $foto = $this->request->getFile('foto');

        if (!$foto || $foto->getError() === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        if (!$foto->isValid() || $foto->hasMoved()) {
            throw new \RuntimeException('File foto tidak valid.');
        }

        // Validasi khusus file upload pada CI4.
        if (!$this->validateData([], [
            'foto' => 'is_image[foto]|max_size[foto,2048]|ext_in[foto,jpg,jpeg,png,webp]'
        ])) {
            throw new \RuntimeException('Foto harus JPG, PNG, atau WEBP dan maksimal 2 MB.');
        }

        $folder = FCPATH . 'uploads/products/';

        if (!is_dir($folder)) {
            mkdir($folder, 0775, true);
        }

        $namaFoto = $foto->getRandomName();
        $foto->move($folder, $namaFoto);

        return $namaFoto;
    }

    public function store()
    {
        $rules = [
            'nama_produk' => 'required|max_length[150]',
            'kategori' => 'required|max_length[50]',
            'deskripsi' => 'permit_empty',
            'harga' => 'required|decimal|greater_than[0]',
            'stok' => 'required|integer|greater_than_equal_to[0]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        try {
            $foto = $this->uploadFoto();

            $this->productModel->insert([
                'nama_produk' => $this->request->getPost('nama_produk'),
                'kategori' => $this->request->getPost('kategori'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'harga' => $this->request->getPost('harga'),
                'stok' => $this->request->getPost('stok'),
                'foto' => $foto,
                'aktif' => 1
            ]);

            return redirect()->to('/admin/products')
                ->with('success', 'Produk berhasil ditambahkan!');

        } catch (\Throwable $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            return redirect()->to('/admin/products')
                ->with('error', 'Produk tidak ditemukan!');
        }

        return view('admin/products/edit', [
            'title' => 'Edit Produk',
            'product' => $product
        ]);
    }

    public function update($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            return redirect()->to('/admin/products')
                ->with('error', 'Produk tidak ditemukan!');
        }

        $rules = [
            'nama_produk' => 'required|max_length[150]',
            'kategori' => 'required|max_length[50]',
            'deskripsi' => 'permit_empty',
            'harga' => 'required|decimal|greater_than[0]',
            'stok' => 'required|integer|greater_than_equal_to[0]',
            'aktif' => 'required|in_list[0,1]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        try {
            $foto = $this->uploadFoto();

            if ($foto && $product['foto']) {
                $oldPath = FCPATH . 'uploads/products/' . $product['foto'];

                if (is_file($oldPath)) {
                    unlink($oldPath);
                }
            }

            $this->productModel->update($id, [
                'nama_produk' => $this->request->getPost('nama_produk'),
                'kategori' => $this->request->getPost('kategori'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'harga' => $this->request->getPost('harga'),
                'stok' => $this->request->getPost('stok'),
                'aktif' => $this->request->getPost('aktif'),
                'foto' => $foto ?? $product['foto']
            ]);

            return redirect()->to('/admin/products')
                ->with('success', 'Produk berhasil diperbarui!');

        } catch (\Throwable $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $product = $this->productModel->find($id);

        if (!$product) {
            return redirect()->to('/admin/products')
                ->with('error', 'Produk tidak ditemukan!');
        }

        if ($product['foto']) {
            $path = FCPATH . 'uploads/products/' . $product['foto'];

            if (is_file($path)) {
                unlink($path);
            }
        }

        $this->productModel->delete($id);

        return redirect()->to('/admin/products')
            ->with('success', 'Produk berhasil dihapus!');
    }
}