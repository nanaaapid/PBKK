<?php

namespace App\Models;

use CodeIgniter\Model;

class KRSModel extends Model
{
    protected $table = 'krs';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'mahasiswa_id',
        'mata_kuliah_id',
        'tahun_akademik',
        'semester'
    ];

    protected $useTimestamps = true;
}