<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KelasModel;

class Kelas extends BaseController
{
    protected $kelasModel;

    public function __construct()
    {
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kelas',
            'kelas' => $this->kelasModel->findAll()
        ];
        return view('admin/kelas/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Kelas'];
        return view('admin/kelas/create', $data);
    }

    public function store()
    {
        $this->kelasModel->insert([
            'nama_kelas' => $this->request->getPost('nama_kelas')
        ]);
        return redirect()->to('/admin/kelas')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Kelas',
            'kelas' => $this->kelasModel->find($id)
        ];
        return view('admin/kelas/edit', $data);
    }

    public function update($id)
    {
        $this->kelasModel->update($id, [
            'nama_kelas' => $this->request->getPost('nama_kelas')
        ]);
        return redirect()->to('/admin/kelas')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->kelasModel->delete($id);
        return redirect()->to('/admin/kelas')->with('success', 'Kelas berhasil dihapus.');
    }
}