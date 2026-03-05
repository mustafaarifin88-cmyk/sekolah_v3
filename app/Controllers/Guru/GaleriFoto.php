<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\GaleriFotoModel;

class GaleriFoto extends BaseController
{
    protected $galeriModel;

    public function __construct()
    {
        $this->galeriModel = new GaleriFotoModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Galeri Foto',
            'galeri' => $this->galeriModel->getGaleriWithPenulis()
        ];
        return view('guru/galeri_foto/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Foto'];
        return view('guru/galeri_foto/create', $data);
    }

    public function store()
    {
        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads/galeri', $namaFoto);

        $this->galeriModel->insert([
            'judul'      => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan'),
            'foto'       => $namaFoto,
            'penulis_id' => session()->get('id')
        ]);

        return redirect()->to('/guru/galeri_foto')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Foto',
            'galeri' => $this->galeriModel->find($id)
        ];
        return view('guru/galeri_foto/edit', $data);
    }

    public function update($id)
    {
        $galeri = $this->galeriModel->find($id);
        $dataUpdate = [
            'judul'      => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/galeri', $namaFoto);
            $dataUpdate['foto'] = $namaFoto;
            if ($galeri['foto'] && file_exists('uploads/galeri/' . $galeri['foto'])) {
                unlink('uploads/galeri/' . $galeri['foto']);
            }
        }

        $this->galeriModel->update($id, $dataUpdate);
        return redirect()->to('/guru/galeri_foto')->with('success', 'Foto berhasil diperbarui.');
    }

    public function delete($id)
    {
        $galeri = $this->galeriModel->find($id);
        if ($galeri['foto'] && file_exists('uploads/galeri/' . $galeri['foto'])) {
            unlink('uploads/galeri/' . $galeri['foto']);
        }
        $this->galeriModel->delete($id);
        return redirect()->to('/guru/galeri_foto')->with('success', 'Foto berhasil dihapus.');
    }
}