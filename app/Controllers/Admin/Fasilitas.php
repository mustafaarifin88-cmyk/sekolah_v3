<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FasilitasModel;
use App\Models\KategoriFasilitasModel;

class Fasilitas extends BaseController
{
    protected $fasilitasModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->fasilitasModel = new FasilitasModel();
        $this->kategoriModel = new KategoriFasilitasModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Data Fasilitas',
            'fasilitas' => $this->fasilitasModel->getFasilitasWithKategori()
        ];
        return view('admin/fasilitas/index', $data);
    }

    public function create()
    {
        $data = [
            'title'    => 'Tambah Fasilitas',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/fasilitas/create', $data);
    }

    public function store()
    {
        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads/fasilitas', $namaFoto);

        $this->fasilitasModel->insert([
            'judul'       => $this->request->getPost('judul'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'kondisi'     => $this->request->getPost('kondisi'),
            'tgl_masuk'   => $this->request->getPost('tgl_masuk'),
            'keterangan'  => $this->request->getPost('keterangan'),
            'foto'        => $namaFoto
        ]);

        return redirect()->to('/admin/fasilitas')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'     => 'Edit Fasilitas',
            'fasilitas' => $this->fasilitasModel->find($id),
            'kategori'  => $this->kategoriModel->findAll()
        ];
        return view('admin/fasilitas/edit', $data);
    }

    public function update($id)
    {
        $fasilitas = $this->fasilitasModel->find($id);
        $dataUpdate = [
            'judul'       => $this->request->getPost('judul'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'kondisi'     => $this->request->getPost('kondisi'),
            'tgl_masuk'   => $this->request->getPost('tgl_masuk'),
            'keterangan'  => $this->request->getPost('keterangan')
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/fasilitas', $namaFoto);
            $dataUpdate['foto'] = $namaFoto;
            if ($fasilitas['foto'] && file_exists('uploads/fasilitas/' . $fasilitas['foto'])) {
                unlink('uploads/fasilitas/' . $fasilitas['foto']);
            }
        }

        $this->fasilitasModel->update($id, $dataUpdate);
        return redirect()->to('/admin/fasilitas')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $fasilitas = $this->fasilitasModel->find($id);
        if ($fasilitas['foto'] && file_exists('uploads/fasilitas/' . $fasilitas['foto'])) {
            unlink('uploads/fasilitas/' . $fasilitas['foto']);
        }
        $this->fasilitasModel->delete($id);
        return redirect()->to('/admin/fasilitas')->with('success', 'Data berhasil dihapus.');
    }
}