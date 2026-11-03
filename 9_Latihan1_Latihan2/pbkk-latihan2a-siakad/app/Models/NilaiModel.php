<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'krs_id',
        'nilai_angka',
        'nilai_huruf'
    ];

    protected $useTimestamps = true;
}