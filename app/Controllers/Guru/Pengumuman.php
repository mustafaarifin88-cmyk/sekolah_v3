<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\PengumumanModel;
use App\Models\KategoriPengumumanModel;

class Pengumuman extends BaseController
{
    protected $pengumumanModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->pengumumanModel = new PengumumanModel();
        $this->kategoriModel = new KategoriPengumumanModel();
    }

    public function index()
    {
        $data = [
            'title'      => 'Data Pengumuman',
            'pengumuman' => $this->pengumumanModel->getPengumumanLengkap()
        ];
        return view('guru/pengumuman/index', $data);
    }

    public function create()
    {
        $data = [
            'title'    => 'Tambah Pengumuman',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('guru/pengumuman/create', $data);
    }

    public function store()
    {
        $slug = url_title($this->request->getPost('judul'), '-', true);

        $this->pengumumanModel->insert([
            'judul'          => $this->request->getPost('judul'),
            'slug'           => $slug,
            'kategori_id'    => $this->request->getPost('kategori_id'),
            'status_publish' => $this->request->getPost('status_publish'),
            'tgl_publish'    => $this->request->getPost('tgl_publish'),
            'isi'            => $this->request->getPost('isi'),
            'penulis_id'     => session()->get('id')
        ]);

        return redirect()->to('/guru/pengumuman')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'      => 'Edit Pengumuman',
            'pengumuman' => $this->pengumumanModel->find($id),
            'kategori'   => $this->kategoriModel->findAll()
        ];
        return view('guru/pengumuman/edit', $data);
    }

    public function update($id)
    {
        $slug = url_title($this->request->getPost('judul'), '-', true);

        $this->pengumumanModel->update($id, [
            'judul'          => $this->request->getPost('judul'),
            'slug'           => $slug,
            'kategori_id'    => $this->request->getPost('kategori_id'),
            'status_publish' => $this->request->getPost('status_publish'),
            'tgl_publish'    => $this->request->getPost('tgl_publish'),
            'isi'            => $this->request->getPost('isi')
        ]);

        return redirect()->to('/guru/pengumuman')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->pengumumanModel->delete($id);
        return redirect()->to('/guru/pengumuman')->with('success', 'Pengumuman berhasil dihapus.');
    }
}