<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriBeritaModel;

class KategoriBerita extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriBeritaModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Kategori Berita',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/kategori_berita/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Kategori Berita'];
        return view('admin/kategori_berita/create', $data);
    }

    public function store()
    {
        $this->kategoriModel->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/kategori_berita')->with('success', 'Kategori berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Kategori Berita',
            'kategori' => $this->kategoriModel->find($id)
        ];
        return view('admin/kategori_berita/edit', $data);
    }

    public function update($id)
    {
        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/kategori_berita')->with('success', 'Kategori berita berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        return redirect()->to('/admin/kategori_berita')->with('success', 'Kategori berita berhasil dihapus.');
    }
}