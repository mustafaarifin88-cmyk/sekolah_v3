<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProgramModel;
use App\Models\KategoriProgramModel;

class Program extends BaseController
{
    protected $programModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->programModel = new ProgramModel();
        $this->kategoriModel = new KategoriProgramModel();
    }

    public function index()
    {
        $data = [
            'title'   => 'Program Unggulan',
            'program' => $this->programModel->getProgramWithKategori()
        ];
        return view('admin/program/index', $data);
    }

    public function create()
    {
        $data = [
            'title'    => 'Tambah Program',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/program/create', $data);
    }

    public function store()
    {
        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads/program', $namaFoto);

        $this->programModel->insert([
            'judul'       => $this->request->getPost('judul'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'keterangan'  => $this->request->getPost('keterangan'),
            'foto'        => $namaFoto
        ]);

        return redirect()->to('/admin/program')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Program',
            'program'  => $this->programModel->find($id),
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/program/edit', $data);
    }

    public function update($id)
    {
        $program = $this->programModel->find($id);
        $dataUpdate = [
            'judul'       => $this->request->getPost('judul'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'keterangan'  => $this->request->getPost('keterangan')
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/program', $namaFoto);
            $dataUpdate['foto'] = $namaFoto;
            if ($program['foto'] && file_exists('uploads/program/' . $program['foto'])) {
                unlink('uploads/program/' . $program['foto']);
            }
        }

        $this->programModel->update($id, $dataUpdate);
        return redirect()->to('/admin/program')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $program = $this->programModel->find($id);
        if ($program['foto'] && file_exists('uploads/program/' . $program['foto'])) {
            unlink('uploads/program/' . $program['foto']);
        }
        $this->programModel->delete($id);
        return redirect()->to('/admin/program')->with('success', 'Data berhasil dihapus.');
    }
}