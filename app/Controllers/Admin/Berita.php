<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KategoriBeritaModel;

class Berita extends BaseController
{
    protected $beritaModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->kategoriModel = new KategoriBeritaModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Data Berita',
            'berita' => $this->beritaModel->getBeritaLengkap()
        ];
        return view('admin/berita/index', $data);
    }

    public function create()
    {
        $data = [
            'title'    => 'Tambah Berita',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/berita/create', $data);
    }

    public function store()
    {
        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads/berita', $namaFoto);

        $slug = url_title($this->request->getPost('judul'), '-', true);

        $this->beritaModel->insert([
            'judul'          => $this->request->getPost('judul'),
            'slug'           => $slug,
            'kategori_id'    => $this->request->getPost('kategori_id'),
            'status_publish' => $this->request->getPost('status_publish'),
            'tgl_publish'    => $this->request->getPost('tgl_publish'),
            'isi'            => $this->request->getPost('isi'),
            'seo_keywords'   => $this->request->getPost('seo_keywords'),
            'penulis_id'     => session()->get('id'),
            'foto'           => $namaFoto
        ]);

        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'    => 'Edit Berita',
            'berita'   => $this->beritaModel->find($id),
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('admin/berita/edit', $data);
    }

    public function update($id)
    {
        $berita = $this->beritaModel->find($id);
        $slug = url_title($this->request->getPost('judul'), '-', true);

        $dataUpdate = [
            'judul'          => $this->request->getPost('judul'),
            'slug'           => $slug,
            'kategori_id'    => $this->request->getPost('kategori_id'),
            'status_publish' => $this->request->getPost('status_publish'),
            'tgl_publish'    => $this->request->getPost('tgl_publish'),
            'isi'            => $this->request->getPost('isi'),
            'seo_keywords'   => $this->request->getPost('seo_keywords')
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/berita', $namaFoto);
            $dataUpdate['foto'] = $namaFoto;
            if ($berita['foto'] && file_exists('uploads/berita/' . $berita['foto'])) {
                unlink('uploads/berita/' . $berita['foto']);
            }
        }

        $this->beritaModel->update($id, $dataUpdate);
        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil diperbarui.');
    }

    public function delete($id)
    {
        $berita = $this->beritaModel->find($id);
        if ($berita['foto'] && file_exists('uploads/berita/' . $berita['foto'])) {
            unlink('uploads/berita/' . $berita['foto']);
        }
        $this->beritaModel->delete($id);
        return redirect()->to('/admin/berita')->with('success', 'Berita berhasil dihapus.');
    }
}