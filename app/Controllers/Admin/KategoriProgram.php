<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriProgramModel;

class KategoriProgram extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriProgramModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Kategori Program Unggulan',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/kategori_program/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Kategori Program'];
        return view('admin/kategori_program/create', $data);
    }

    public function store()
    {
        $this->kategoriModel->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/kategori_program')->with('success', 'Kategori program berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Kategori Program',
            'kategori' => $this->kategoriModel->find($id)
        ];
        return view('admin/kategori_program/edit', $data);
    }

    public function update($id)
    {
        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/kategori_program')->with('success', 'Kategori program berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        return redirect()->to('/admin/kategori_program')->with('success', 'Kategori program berhasil dihapus.');
    }
}