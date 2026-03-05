<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StrukturModel;

class Struktur extends BaseController
{
    protected $strukturModel;

    public function __construct()
    {
        $this->strukturModel = new StrukturModel();
    }

    public function index()
    {
        $data = [
            'title'    => 'Struktur Organisasi',
            'struktur' => $this->strukturModel->findAll()
        ];
        return view('admin/struktur/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Struktur Organisasi'];
        return view('admin/struktur/create', $data);
    }

    public function store()
    {
        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads/struktur', $namaFoto);

        $this->strukturModel->insert([
            'judul'      => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan'),
            'foto'       => $namaFoto
        ]);

        return redirect()->to('/admin/struktur')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Struktur Organisasi',
            'struktur' => $this->strukturModel->find($id)
        ];
        return view('admin/struktur/edit', $data);
    }

    public function update($id)
    {
        $struktur = $this->strukturModel->find($id);
        $dataUpdate = [
            'judul'      => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/struktur', $namaFoto);
            $dataUpdate['foto'] = $namaFoto;
            if ($struktur['foto'] && file_exists('uploads/struktur/' . $struktur['foto'])) {
                unlink('uploads/struktur/' . $struktur['foto']);
            }
        }

        $this->strukturModel->update($id, $dataUpdate);
        return redirect()->to('/admin/struktur')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $struktur = $this->strukturModel->find($id);
        if ($struktur['foto'] && file_exists('uploads/struktur/' . $struktur['foto'])) {
            unlink('uploads/struktur/' . $struktur['foto']);
        }
        $this->strukturModel->delete($id);
        return redirect()->to('/admin/struktur')->with('success', 'Data berhasil dihapus.');
    }
}