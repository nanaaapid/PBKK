<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\UserModel;

class AdminDashboard extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $orderModel = new OrderModel();
        $userModel = new UserModel();

        return view('admin/dashboard', [
            'title' => 'Admin Dashboard',
            'totalProduk' => $productModel->countAll(),
            'totalPesanan' => $orderModel->countAll(),
            'totalPelanggan' => $userModel->where('role', 'customer')->countAllResults(),
            'totalPendapatan' => $orderModel
                ->where('status', 'Selesai')
                ->selectSum('total_harga')
                ->first()['total_harga'] ?? 0
        ]);
    }
}