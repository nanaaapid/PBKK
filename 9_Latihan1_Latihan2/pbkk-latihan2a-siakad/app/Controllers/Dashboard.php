<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\DosenModel;
use App\Models\MataKuliahModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $mahasiswa = new MahasiswaModel();
        $dosen = new DosenModel();
        $mataKuliah = new MataKuliahModel();

        $data = [
            'title' => 'Dashboard',
            'totalMahasiswa' => $mahasiswa->countAll(),
            'totalDosen' => $dosen->countAll(),
            'totalMataKuliah' => $mataKuliah->countAll()
        ];

        return view('dashboard/index', $data);
    }
}