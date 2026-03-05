<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriEskulModel;

class KategoriEskul extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriEskulModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Kategori Ekstrakurikuler',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/kategori_eskul/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Kategori Ekstrakurikuler'];
        return view('admin/kategori_eskul/create', $data);
    }

    public function store()
    {
        $this->kategoriModel->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/kategori_eskul')->with('success', 'Kategori ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Kategori Ekstrakurikuler',
            'kategori' => $this->kategoriModel->find($id)
        ];
        return view('admin/kategori_eskul/edit', $data);
    }

    public function update($id)
    {
        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/kategori_eskul')->with('success', 'Kategori ekstrakurikuler berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        return redirect()->to('/admin/kategori_eskul')->with('success', 'Kategori ekstrakurikuler berhasil dihapus.');
    }
}