<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
    public function index()
    {
        $model = new ProductModel();

        $data = [
            'title' => 'Luxury Collection',
            'products' => $model
                ->where('aktif', 1)
                ->orderBy('created_at', 'DESC')
                ->findAll()
        ];

        return view('products/index', $data);
    }

    public function show($id)
    {
        $product = (new ProductModel())
            ->where('aktif', 1)
            ->find($id);

        if (!$product) {
            return redirect()->to('/products')
                ->with('error', 'Produk tidak ditemukan!');
        }

        return view('products/show', [
            'title' => $product['nama_produk'],
            'product' => $product
        ]);
    }
}