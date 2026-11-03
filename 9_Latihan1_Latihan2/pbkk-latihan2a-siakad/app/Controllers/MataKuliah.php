<?php

namespace App\Controllers;

use App\Models\MataKuliahModel;
use App\Models\DosenModel;

class MataKuliah extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new MataKuliahModel();
    }

    public function index()
    {
        $data = $this->model
            ->select('mata_kuliah.*, dosen.nama AS nama_dosen')
            ->join('dosen', 'dosen.id = mata_kuliah.dosen_id', 'left')
            ->findAll();

        return view('mata_kuliah/index', [
            'title' => 'Data Mata Kuliah',
            'mataKuliah' => $data
        ]);
    }

    public function create()
    {
        return view('mata_kuliah/create', [
            'title' => 'Tambah Mata Kuliah',
            'dosen' => (new DosenModel())->findAll()
        ]);
    }

    public function store()
    {
        $rules = [
            'kode_mk' => 'required|is_unique[mata_kuliah.kode_mk]',
            'nama_mk' => 'required',
            'sks' => 'required|integer|greater_than[0]|less_than_equal_to[6]',
            'semester' => 'required|integer|greater_than[0]|less_than_equal_to[14]',
            'dosen_id' => 'permit_empty|is_natural_no_zero'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->model->insert([
            'kode_mk' => $this->request->getPost('kode_mk'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks' => $this->request->getPost('sks'),
            'semester' => $this->request->getPost('semester'),
            'dosen_id' => $this->request->getPost('dosen_id') ?: null
        ]);

        return redirect()->to('/mata-kuliah')
            ->with('success', 'Mata kuliah berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $mk = $this->model->find($id);

        if (!$mk) {
            return redirect()->to('/mata-kuliah');
        }

        return view('mata_kuliah/edit', [
            'title' => 'Edit Mata Kuliah',
            'mk' => $mk,
            'dosen' => (new DosenModel())->findAll()
        ]);
    }

    public function update($id)
    {
        $mk = $this->model->find($id);

        if (!$mk) {
            return redirect()->to('/mata-kuliah');
        }

        $rules = [
            'kode_mk' => "required|is_unique[mata_kuliah.kode_mk,id,{$id}]",
            'nama_mk' => 'required',
            'sks' => 'required|integer|greater_than[0]|less_than_equal_to[6]',
            'semester' => 'required|integer|greater_than[0]|less_than_equal_to[14]',
            'dosen_id' => 'permit_empty|is_natural_no_zero'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->model->update($id, [
            'kode_mk' => $this->request->getPost('kode_mk'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks' => $this->request->getPost('sks'),
            'semester' => $this->request->getPost('semester'),
            'dosen_id' => $this->request->getPost('dosen_id') ?: null
        ]);

        return redirect()->to('/mata-kuliah')
            ->with('success', 'Mata kuliah berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->model->delete($id);

        return redirect()->to('/mata-kuliah')
            ->with('success', 'Mata kuliah berhasil dihapus!');
    }
}