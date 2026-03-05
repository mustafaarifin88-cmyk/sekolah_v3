<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AgendaModel;
use App\Models\KategoriAgendaModel;

class Agenda extends BaseController
{
    protected $agendaModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->agendaModel = new AgendaModel();
        $this->kategoriModel = new KategoriAgendaModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Data Agenda Sekolah',
            'agenda' => $this->agendaModel->getAgendaWithKategori()
        ];
        return view('admin/agenda/index', $data);
    }

    public function create()
    {
        $data = [
            'title'    => 'Tambah Agenda',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/agenda/create', $data);
    }

    public function store()
    {
        $dataInsert = [
            'judul'       => $this->request->getPost('judul'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'keterangan'  => $this->request->getPost('keterangan')
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/agenda', $namaFoto);
            $dataInsert['foto'] = $namaFoto;
        }

        $this->agendaModel->insert($dataInsert);

        return redirect()->to('/admin/agenda')->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Agenda',
            'agenda'   => $this->agendaModel->find($id),
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/agenda/edit', $data);
    }

    public function update($id)
    {
        $agenda = $this->agendaModel->find($id);
        $dataUpdate = [
            'judul'       => $this->request->getPost('judul'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'keterangan'  => $this->request->getPost('keterangan')
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/agenda', $namaFoto);
            $dataUpdate['foto'] = $namaFoto;
            if ($agenda['foto'] && file_exists('uploads/agenda/' . $agenda['foto'])) {
                unlink('uploads/agenda/' . $agenda['foto']);
            }
        }

        $this->agendaModel->update($id, $dataUpdate);
        return redirect()->to('/admin/agenda')->with('success', 'Agenda berhasil diperbarui.');
    }

    public function delete($id)
    {
        $agenda = $this->agendaModel->find($id);
        if ($agenda['foto'] && file_exists('uploads/agenda/' . $agenda['foto'])) {
            unlink('uploads/agenda/' . $agenda['foto']);
        }
        $this->agendaModel->delete($id);
        return redirect()->to('/admin/agenda')->with('success', 'Agenda berhasil dihapus.');
    }
}