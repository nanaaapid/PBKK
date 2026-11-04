<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Menu extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        $this->menuModel = new MenuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Menu',
            'menus' => $this->menuModel->findAll()
        ];

        return view('menu/index', $data);
    }

    public function create()
    {
        return view('menu/create', [
            'title' => 'Tambah Menu'
        ]);
    }

    public function store()
    {
        $rules = [
            'nama_menu' => 'required|max_length[100]',
            'kategori' => 'required|in_list[Makanan,Minuman,Dessert]',
            'harga' => 'required|decimal',
            'foto' => 'permit_empty|is_image[foto]|max_size[foto,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $foto = $this->request->getFile('foto');
        $namaFoto = null;

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $folder = FCPATH . 'uploads/menu/';

            if (!is_dir($folder)) {
                mkdir($folder, 0777, true);
            }

            $namaFoto = $foto->getRandomName();
            $foto->move($folder, $namaFoto);
        }

        $this->menuModel->insert([
            'nama_menu' => $this->request->getPost('nama_menu'),
            'kategori' => $this->request->getPost('kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'foto' => $namaFoto
        ]);

        return redirect()->to('/menu')
            ->with('success', 'Menu berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $menu = $this->menuModel->find($id);

        if (!$menu) {
            return redirect()->to('/menu')
                ->with('error', 'Menu tidak ditemukan!');
        }

        return view('menu/edit', [
            'title' => 'Edit Menu',
            'menu' => $menu
        ]);
    }

    public function update($id)
    {
        $menu = $this->menuModel->find($id);

        if (!$menu) {
            return redirect()->to('/menu')
                ->with('error', 'Menu tidak ditemukan!');
        }

        $rules = [
            'nama_menu' => 'required|max_length[100]',
            'kategori' => 'required|in_list[Makanan,Minuman,Dessert]',
            'harga' => 'required|decimal',
            'foto' => 'permit_empty|is_image[foto]|max_size[foto,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $namaFoto = $menu['foto'];
        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $folder = FCPATH . 'uploads/menu/';

            if (!is_dir($folder)) {
                mkdir($folder, 0777, true);
            }

            $namaFotoBaru = $foto->getRandomName();
            $foto->move($folder, $namaFotoBaru);

            if ($namaFoto && is_file($folder . $namaFoto)) {
                unlink($folder . $namaFoto);
            }

            $namaFoto = $namaFotoBaru;
        }

        $this->menuModel->update($id, [
            'nama_menu' => $this->request->getPost('nama_menu'),
            'kategori' => $this->request->getPost('kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'foto' => $namaFoto
        ]);

        return redirect()->to('/menu')
            ->with('success', 'Menu berhasil diperbarui!');
    }

    public function delete($id)
    {
        $menu = $this->menuModel->find($id);

        if (!$menu) {
            return redirect()->to('/menu')
                ->with('error', 'Menu tidak ditemukan!');
        }

        if ($menu['foto']) {
            $path = FCPATH . 'uploads/menu/' . $menu['foto'];

            if (is_file($path)) {
                unlink($path);
            }
        }

        $this->menuModel->delete($id);

        return redirect()->to('/menu')
            ->with('success', 'Menu berhasil dihapus!');
    }
}