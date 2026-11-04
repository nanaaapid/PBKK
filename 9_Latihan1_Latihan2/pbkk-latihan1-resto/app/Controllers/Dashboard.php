<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $model = new MenuModel();

        $data = [
            'title' => 'Dashboard',
            'totalMenu' => $model->countAll(),
            'totalMakanan' => $model->where('kategori', 'Makanan')->countAllResults(),
            'totalMinuman' => $model->where('kategori', 'Minuman')->countAllResults(),
            'totalDessert' => $model->where('kategori', 'Dessert')->countAllResults()
        ];

        return view('dashboard/index', $data);
    }
}