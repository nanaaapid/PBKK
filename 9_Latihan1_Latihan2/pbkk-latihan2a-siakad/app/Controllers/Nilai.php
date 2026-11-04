<?php

namespace App\Controllers;

use App\Models\NilaiModel;
use App\Models\KRSModel;

class Nilai extends BaseController
{
    protected $nilaiModel;

    public function __construct()
    {
        $this->nilaiModel = new NilaiModel();
    }

    private function konversiNilai($angka)
    {
        if ($angka >= 85) {
            return 'A';
        } elseif ($angka >= 80) {
            return 'AB';
        } elseif ($angka >= 75) {
            return 'B';
        } elseif ($angka >= 70) {
            return 'BC';
        } elseif ($angka >= 60) {
            return 'C';
        } elseif ($angka >= 50) {
            return 'D';
        }

        return 'E';
    }

    public function index()
    {
        $nilai = $this->nilaiModel
            ->select('nilai.*, krs.tahun_akademik, krs.semester,
                      mahasiswa.nim, mahasiswa.nama AS nama_mahasiswa,
                      mata_kuliah.kode_mk, mata_kuliah.nama_mk, mata_kuliah.sks')
            ->join('krs', 'krs.id = nilai.krs_id')
            ->join('mahasiswa', 'mahasiswa.id = krs.mahasiswa_id')
            ->join('mata_kuliah', 'mata_kuliah.id = krs.mata_kuliah_id')
            ->findAll();

        return view('nilai/index', [
            'title' => 'Data Nilai',
            'nilai' => $nilai
        ]);
    }

    public function create()
    {
        $db = \Config\Database::connect();

        $krs = $db->table('krs')
            ->select('krs.id, krs.tahun_akademik, krs.semester,
                      mahasiswa.nim, mahasiswa.nama AS nama_mahasiswa,
                      mata_kuliah.kode_mk, mata_kuliah.nama_mk')
            ->join('mahasiswa', 'mahasiswa.id = krs.mahasiswa_id')
            ->join('mata_kuliah', 'mata_kuliah.id = krs.mata_kuliah_id')
            ->join('nilai', 'nilai.krs_id = krs.id', 'left')
            ->where('nilai.id', null)
            ->get()
            ->getResultArray();

        return view('nilai/create', [
            'title' => 'Input Nilai',
            'krs' => $krs
        ]);
    }

    public function store()
    {
        $rules = [
            'krs_id' => 'required|is_natural_no_zero',
            'nilai_angka' => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[100]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $krsModel = new KRSModel();
        $krsId = $this->request->getPost('krs_id');

        if (!$krsModel->find($krsId)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Data KRS tidak ditemukan!');
        }

        if ($this->nilaiModel->where('krs_id', $krsId)->first()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Nilai untuk KRS ini sudah tersedia!');
        }

        $angka = (float) $this->request->getPost('nilai_angka');

        $this->nilaiModel->insert([
            'krs_id' => $krsId,
            'nilai_angka' => $angka,
            'nilai_huruf' => $this->konversiNilai($angka)
        ]);

        return redirect()->to('/nilai')
            ->with('success', 'Nilai berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $nilai = $this->nilaiModel->find($id);

        if (!$nilai) {
            return redirect()->to('/nilai')
                ->with('error', 'Data nilai tidak ditemukan!');
        }

        return view('nilai/edit', [
            'title' => 'Edit Nilai',
            'nilai' => $nilai
        ]);
    }

    public function update($id)
    {
        $nilai = $this->nilaiModel->find($id);

        if (!$nilai) {
            return redirect()->to('/nilai')
                ->with('error', 'Data nilai tidak ditemukan!');
        }

        $rules = [
            'nilai_angka' => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[100]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $angka = (float) $this->request->getPost('nilai_angka');

        $this->nilaiModel->update($id, [
            'nilai_angka' => $angka,
            'nilai_huruf' => $this->konversiNilai($angka)
        ]);

        return redirect()->to('/nilai')
            ->with('success', 'Nilai berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->nilaiModel->delete($id);

        return redirect()->to('/nilai')
            ->with('success', 'Data nilai berhasil dihapus!');
    }
}