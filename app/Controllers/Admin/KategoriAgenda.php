<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriAgendaModel;

class KategoriAgenda extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriAgendaModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Kategori Agenda',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/kategori_agenda/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Kategori Agenda'];
        return view('admin/kategori_agenda/create', $data);
    }

    public function store()
    {
        $this->kategoriModel->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/kategori_agenda')->with('success', 'Kategori agenda berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Kategori Agenda',
            'kategori' => $this->kategoriModel->find($id)
        ];
        return view('admin/kategori_agenda/edit', $data);
    }

    public function update($id)
    {
        $this->kategoriModel->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan'    => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/admin/kategori_agenda')->with('success', 'Kategori agenda berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        return redirect()->to('/admin/kategori_agenda')->with('success', 'Kategori agenda berhasil dihapus.');
    }
}