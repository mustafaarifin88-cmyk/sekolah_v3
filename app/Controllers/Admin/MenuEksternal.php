<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuEksternalModel;

class MenuEksternal extends BaseController
{
    protected $menuModel;

    public function __construct()
    {
        $this->menuModel = new MenuEksternalModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Menu & Layanan Eksternal',
            'menu'  => $this->menuModel->findAll()
        ];
        return view('admin/menu_eksternal/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Menu Eksternal'];
        return view('admin/menu_eksternal/create', $data);
    }

    public function store()
    {
        $this->menuModel->insert([
            'judul' => $this->request->getPost('judul'),
            'url'   => $this->request->getPost('url')
        ]);
        return redirect()->to('/admin/menu_eksternal')->with('success', 'Menu eksternal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Menu Eksternal',
            'menu'  => $this->menuModel->find($id)
        ];
        return view('admin/menu_eksternal/edit', $data);
    }

    public function update($id)
    {
        $this->menuModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'url'   => $this->request->getPost('url')
        ]);
        return redirect()->to('/admin/menu_eksternal')->with('success', 'Menu eksternal berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->menuModel->delete($id);
        return redirect()->to('/admin/menu_eksternal')->with('success', 'Menu eksternal berhasil dihapus.');
    }
}