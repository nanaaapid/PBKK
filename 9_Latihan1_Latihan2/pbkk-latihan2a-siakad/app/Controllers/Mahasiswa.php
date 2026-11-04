<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        return view('mahasiswa/index', [
            'title' => 'Data Mahasiswa',
            'mahasiswa' => $this->mahasiswaModel->findAll()
        ]);
    }

    public function create()
    {
        return view('mahasiswa/create', [
            'title' => 'Tambah Mahasiswa'
        ]);
    }

    public function store()
    {
        $rules = [
            'nim' => 'required|max_length[20]|is_unique[mahasiswa.nim]',
            'nama' => 'required|max_length[100]',
            'jenis_kelamin' => 'required|in_list[L,P]',
            'jurusan' => 'required',
            'angkatan' => 'required|integer',
            'email' => 'permit_empty|valid_email'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->mahasiswaModel->insert([
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'jurusan' => $this->request->getPost('jurusan'),
            'angkatan' => $this->request->getPost('angkatan'),
            'email' => $this->request->getPost('email')
        ]);

        return redirect()->to('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = $this->mahasiswaModel->find($id);

        if (!$data) {
            return redirect()->to('/mahasiswa')
                ->with('error', 'Mahasiswa tidak ditemukan!');
        }

        return view('mahasiswa/edit', [
            'title' => 'Edit Mahasiswa',
            'mahasiswa' => $data
        ]);
    }

    public function update($id)
    {
        $data = $this->mahasiswaModel->find($id);

        if (!$data) {
            return redirect()->to('/mahasiswa');
        }

        $rules = [
            'nim' => "required|max_length[20]|is_unique[mahasiswa.nim,id,{$id}]",
            'nama' => 'required|max_length[100]',
            'jenis_kelamin' => 'required|in_list[L,P]',
            'jurusan' => 'required',
            'angkatan' => 'required|integer',
            'email' => 'permit_empty|valid_email'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->mahasiswaModel->update($id, [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'jurusan' => $this->request->getPost('jurusan'),
            'angkatan' => $this->request->getPost('angkatan'),
            'email' => $this->request->getPost('email')
        ]);

        return redirect()->to('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->mahasiswaModel->delete($id);

        return redirect()->to('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}