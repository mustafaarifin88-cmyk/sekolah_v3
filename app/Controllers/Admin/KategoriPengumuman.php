<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriPengumumanModel;

class KategoriPengumuman extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriPengumumanModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Kategori Pengumuman',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/kategori_pengumuman/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Kategori Pengumuman'];
        return view('admin/kategori_pengumuman/create', $data);
    }

    public function store()
    {
        $this->kategoriModel->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/kategori_pengumuman')->with('success', 'Kategori pengumuman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Kategori Pengumuman',
            'kategori' => $this->kategoriModel->find($id)
        ];
        return view('admin/kategori_pengumuman/edit', $data);
    }

    public function update($id)
    {
        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/kategori_pengumuman')->with('success', 'Kategori pengumuman berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        return redirect()->to('/admin/kategori_pengumuman')->with('success', 'Kategori pengumuman berhasil dihapus.');
    }
}