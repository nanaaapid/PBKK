<?php

namespace App\Controllers;

use App\Models\DosenModel;

class Dosen extends BaseController
{
    protected $dosenModel;

    public function __construct()
    {
        $this->dosenModel = new DosenModel();
    }

    public function index()
    {
        return view('dosen/index', [
            'title' => 'Data Dosen',
            'dosen' => $this->dosenModel->findAll()
        ]);
    }

    public function create()
    {
        return view('dosen/create', [
            'title' => 'Tambah Dosen'
        ]);
    }

    public function store()
    {
        $rules = [
            'nidn' => 'required|is_unique[dosen.nidn]',
            'nama' => 'required',
            'email' => 'permit_empty|valid_email',
            'bidang_keahlian' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->dosenModel->insert([
            'nidn' => $this->request->getPost('nidn'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'bidang_keahlian' => $this->request->getPost('bidang_keahlian')
        ]);

        return redirect()->to('/dosen')
            ->with('success', 'Data dosen berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $dosen = $this->dosenModel->find($id);

        if (!$dosen) {
            return redirect()->to('/dosen')
                ->with('error', 'Dosen tidak ditemukan!');
        }

        return view('dosen/edit', [
            'title' => 'Edit Dosen',
            'dosen' => $dosen
        ]);
    }

    public function update($id)
    {
        $dosen = $this->dosenModel->find($id);

        if (!$dosen) {
            return redirect()->to('/dosen');
        }

        $rules = [
            'nidn' => "required|is_unique[dosen.nidn,id,{$id}]",
            'nama' => 'required',
            'email' => 'permit_empty|valid_email',
            'bidang_keahlian' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->dosenModel->update($id, [
            'nidn' => $this->request->getPost('nidn'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'bidang_keahlian' => $this->request->getPost('bidang_keahlian')
        ]);

        return redirect()->to('/dosen')
            ->with('success', 'Data dosen berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->dosenModel->delete($id);

        return redirect()->to('/dosen')
            ->with('success', 'Data dosen berhasil dihapus!');
    }
}