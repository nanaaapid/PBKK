<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderItemModel;

class Orders extends BaseController
{
    public function index()
    {
        $orders = (new OrderModel())
            ->where('user_id', session()->get('user_id'))
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('orders/index', [
            'title' => 'Pesanan Saya',
            'orders' => $orders
        ]);
    }

    public function show($id)
    {
        $order = (new OrderModel())
            ->where('user_id', session()->get('user_id'))
            ->find($id);

        if (!$order) {
            return redirect()->to('/orders')
                ->with('error', 'Pesanan tidak ditemukan!');
        }

        $items = (new OrderItemModel())
            ->where('order_id', $id)
            ->findAll();

        return view('orders/show', [
            'title' => 'Detail Pesanan',
            'order' => $order,
            'items' => $items
        ]);
    }
}