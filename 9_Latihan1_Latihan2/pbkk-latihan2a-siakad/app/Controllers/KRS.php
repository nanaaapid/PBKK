<?php

namespace App\Controllers;

use App\Models\KRSModel;
use App\Models\MahasiswaModel;
use App\Models\MataKuliahModel;

class KRS extends BaseController
{
    public function index()
    {
        $model = new KRSModel();

        $data = $model
            ->select('krs.*, mahasiswa.nim, mahasiswa.nama AS nama_mahasiswa,
                      mata_kuliah.kode_mk, mata_kuliah.nama_mk, mata_kuliah.sks')
            ->join('mahasiswa', 'mahasiswa.id = krs.mahasiswa_id')
            ->join('mata_kuliah', 'mata_kuliah.id = krs.mata_kuliah_id')
            ->findAll();

        return view('krs/index', [
            'title' => 'Kartu Rencana Studi',
            'krs' => $data,
            'mahasiswa' => (new MahasiswaModel())->findAll(),
            'mataKuliah' => (new MataKuliahModel())->findAll()
        ]);
    }

    public function store()
    {
        $rules = [
            'mahasiswa_id' => 'required|is_natural_no_zero',
            'mata_kuliah_id' => 'required|is_natural_no_zero',
            'tahun_akademik' => 'required',
            'semester' => 'required|in_list[Ganjil,Genap]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new KRSModel();

        $model->insert([
            'mahasiswa_id' => $this->request->getPost('mahasiswa_id'),
            'mata_kuliah_id' => $this->request->getPost('mata_kuliah_id'),
            'tahun_akademik' => $this->request->getPost('tahun_akademik'),
            'semester' => $this->request->getPost('semester')
        ]);

        return redirect()->to('/krs')
            ->with('success', 'KRS berhasil ditambahkan!');
    }

    public function delete($id)
    {
        (new KRSModel())->delete($id);

        return redirect()->to('/krs')
            ->with('success', 'Data KRS berhasil dihapus!');
    }
}