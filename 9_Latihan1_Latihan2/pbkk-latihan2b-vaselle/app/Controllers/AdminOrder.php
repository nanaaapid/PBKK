<?php

namespace App\Controllers;

use App\Models\OrderModel;
use Config\Database;

class AdminOrder extends BaseController
{
    public function index()
    {
        $db = Database::connect();

        $orders = $db->table('orders')
            ->select('orders.*, users.nama AS nama_pelanggan, users.email')
            ->join('users', 'users.id = orders.user_id')
            ->orderBy('orders.created_at', 'DESC')
            ->get()
            ->getResultArray();

        return view('admin/orders/index', [
            'title' => 'Kelola Pesanan',
            'orders' => $orders
        ]);
    }

    public function update($id)
    {
        $status = $this->request->getPost('status');

        $allowedStatus = [
            'Menunggu Konfirmasi',
            'Diproses',
            'Dikirim',
            'Selesai',
            'Dibatalkan'
        ];

        if (!in_array($status, $allowedStatus, true)) {
            return redirect()->back()
                ->with('error', 'Status pesanan tidak valid!');
        }

        $model = new OrderModel();

        if (!$model->find($id)) {
            return redirect()->back()
                ->with('error', 'Pesanan tidak ditemukan!');
        }

        $model->update($id, ['status' => $status]);

        return redirect()->to('/admin/orders')
            ->with('success', 'Status pesanan berhasil diperbarui!');
    }
}