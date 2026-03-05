<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KalenderModel;

class Kalender extends BaseController
{
    protected $kalenderModel;

    public function __construct()
    {
        $this->kalenderModel = new KalenderModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Kalender Pendidikan',
            'kalender' => $this->kalenderModel->findAll()
        ];
        return view('admin/kalender/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Kalender'];
        return view('admin/kalender/create', $data);
    }

    public function store()
    {
        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads/dokumen', $namaFoto);

        $this->kalenderModel->insert([
            'judul'      => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan'),
            'foto'       => $namaFoto
        ]);

        return redirect()->to('/admin/kalender')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Kalender',
            'kalender' => $this->kalenderModel->find($id)
        ];
        return view('admin/kalender/edit', $data);
    }

    public function update($id)
    {
        $kalender = $this->kalenderModel->find($id);
        $dataUpdate = [
            'judul'      => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/dokumen', $namaFoto);
            $dataUpdate['foto'] = $namaFoto;
            if ($kalender['foto'] && file_exists('uploads/dokumen/' . $kalender['foto'])) {
                unlink('uploads/dokumen/' . $kalender['foto']);
            }
        }

        $this->kalenderModel->update($id, $dataUpdate);
        return redirect()->to('/admin/kalender')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $kalender = $this->kalenderModel->find($id);
        if ($kalender['foto'] && file_exists('uploads/dokumen/' . $kalender['foto'])) {
            unlink('uploads/dokumen/' . $kalender['foto']);
        }
        $this->kalenderModel->delete($id);
        return redirect()->to('/admin/kalender')->with('success', 'Data berhasil dihapus.');
    }
}