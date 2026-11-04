<?php

namespace App\Models;

use CodeIgniter\Model;

class DosenModel extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nidn',
        'nama',
        'email',
        'bidang_keahlian'
    ];

    protected $useTimestamps = true;
}