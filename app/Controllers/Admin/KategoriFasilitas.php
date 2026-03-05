<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriFasilitasModel;

class KategoriFasilitas extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriFasilitasModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Kategori Fasilitas',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/kategori_fasilitas/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Kategori Fasilitas'];
        return view('admin/kategori_fasilitas/create', $data);
    }

    public function store()
    {
        $this->kategoriModel->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/kategori_fasilitas')->with('success', 'Kategori fasilitas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Kategori Fasilitas',
            'kategori' => $this->kategoriModel->find($id)
        ];
        return view('admin/kategori_fasilitas/edit', $data);
    }

    public function update($id)
    {
        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/kategori_fasilitas')->with('success', 'Kategori fasilitas berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        return redirect()->to('/admin/kategori_fasilitas')->with('success', 'Kategori fasilitas berhasil dihapus.');
    }
}