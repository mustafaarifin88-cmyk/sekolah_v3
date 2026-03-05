<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriPrestasiModel;

class KategoriPrestasi extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriPrestasiModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Kategori Prestasi',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/kategori_prestasi/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Kategori Prestasi'];
        return view('admin/kategori_prestasi/create', $data);
    }

    public function store()
    {
        $this->kategoriModel->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/kategori_prestasi')->with('success', 'Kategori prestasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Kategori Prestasi',
            'kategori' => $this->kategoriModel->find($id)
        ];
        return view('admin/kategori_prestasi/edit', $data);
    }

    public function update($id)
    {
        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/kategori_prestasi')->with('success', 'Kategori prestasi berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        return redirect()->to('/admin/kategori_prestasi')->with('success', 'Kategori prestasi berhasil dihapus.');
    }
}