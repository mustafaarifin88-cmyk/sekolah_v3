<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EskulModel;
use App\Models\KategoriEskulModel;

class Ekstrakurikuler extends BaseController
{
    protected $eskulModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->eskulModel = new EskulModel();
        $this->kategoriModel = new KategoriEskulModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Ekstrakurikuler',
            'eskul' => $this->eskulModel->getEskulWithKategori()
        ];
        return view('admin/eskul/index', $data);
    }

    public function create()
    {
        $data = [
            'title'    => 'Tambah Ekstrakurikuler',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/eskul/create', $data);
    }

    public function store()
    {
        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads/eskul', $namaFoto);

        $this->eskulModel->insert([
            'nama_ekstrakurikuler' => $this->request->getPost('nama_ekstrakurikuler'),
            'nama_guru_pembimbing' => $this->request->getPost('nama_guru_pembimbing'),
            'kategori_id'          => $this->request->getPost('kategori_id'),
            'keterangan'           => $this->request->getPost('keterangan'),
            'foto'                 => $namaFoto
        ]);

        return redirect()->to('/admin/ekstrakurikuler')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Ekstrakurikuler',
            'eskul'    => $this->eskulModel->find($id),
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/eskul/edit', $data);
    }

    public function update($id)
    {
        $eskul = $this->eskulModel->find($id);
        $dataUpdate = [
            'nama_ekstrakurikuler' => $this->request->getPost('nama_ekstrakurikuler'),
            'nama_guru_pembimbing' => $this->request->getPost('nama_guru_pembimbing'),
            'kategori_id'          => $this->request->getPost('kategori_id'),
            'keterangan'           => $this->request->getPost('keterangan')
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/eskul', $namaFoto);
            $dataUpdate['foto'] = $namaFoto;
            if ($eskul['foto'] && file_exists('uploads/eskul/' . $eskul['foto'])) {
                unlink('uploads/eskul/' . $eskul['foto']);
            }
        }

        $this->eskulModel->update($id, $dataUpdate);
        return redirect()->to('/admin/ekstrakurikuler')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $eskul = $this->eskulModel->find($id);
        if ($eskul['foto'] && file_exists('uploads/eskul/' . $eskul['foto'])) {
            unlink('uploads/eskul/' . $eskul['foto']);
        }
        $this->eskulModel->delete($id);
        return redirect()->to('/admin/ekstrakurikuler')->with('success', 'Data berhasil dihapus.');
    }
}