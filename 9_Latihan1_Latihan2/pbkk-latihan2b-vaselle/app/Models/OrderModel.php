<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'nomor_pesanan',
        'nama_penerima',
        'no_hp',
        'alamat',
        'catatan',
        'metode_pembayaran',
        'status',
        'total_harga'
    ];

    protected $useTimestamps = true;
}