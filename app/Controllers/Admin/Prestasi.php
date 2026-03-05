<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PrestasiModel;
use App\Models\KategoriPrestasiModel;

class Prestasi extends BaseController
{
    protected $prestasiModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->prestasiModel = new PrestasiModel();
        $this->kategoriModel = new KategoriPrestasiModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Data Prestasi',
            'prestasi' => $this->prestasiModel->getPrestasiWithKategori()
        ];
        return view('admin/prestasi/index', $data);
    }

    public function create()
    {
        $data = [
            'title'    => 'Tambah Prestasi',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/prestasi/create', $data);
    }

    public function store()
    {
        $this->prestasiModel->insert([
            'judul'          => $this->request->getPost('judul'),
            'kategori_id'    => $this->request->getPost('kategori_id'),
            'nama_penerima'  => $this->request->getPost('nama_penerima'),
            'penyelenggara'  => $this->request->getPost('penyelenggara'),
            'hadiah'         => $this->request->getPost('hadiah'),
            'tgl_penerimaan' => $this->request->getPost('tgl_penerimaan'),
            'keterangan'     => $this->request->getPost('keterangan')
        ]);

        return redirect()->to('/admin/prestasi')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Prestasi',
            'prestasi' => $this->prestasiModel->find($id),
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/prestasi/edit', $data);
    }

    public function update($id)
    {
        $this->prestasiModel->update($id, [
            'judul'          => $this->request->getPost('judul'),
            'kategori_id'    => $this->request->getPost('kategori_id'),
            'nama_penerima'  => $this->request->getPost('nama_penerima'),
            'penyelenggara'  => $this->request->getPost('penyelenggara'),
            'hadiah'         => $this->request->getPost('hadiah'),
            'tgl_penerimaan' => $this->request->getPost('tgl_penerimaan'),
            'keterangan'     => $this->request->getPost('keterangan')
        ]);

        return redirect()->to('/admin/prestasi')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->prestasiModel->delete($id);
        return redirect()->to('/admin/prestasi')->with('success', 'Prestasi berhasil dihapus.');
    }
}