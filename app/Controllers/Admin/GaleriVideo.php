<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleriVideoModel;

class GaleriVideo extends BaseController
{
    protected $videoModel;

    public function __construct()
    {
        $this->videoModel = new GaleriVideoModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Galeri Video',
            'galeri' => $this->videoModel->getVideoWithPenulis()
        ];
        return view('admin/galeri_video/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Video'];
        return view('admin/galeri_video/create', $data);
    }

    public function store()
    {
        $thumbnail = $this->request->getFile('thumbnail');
        $namaThumbnail = $thumbnail->getRandomName();
        $thumbnail->move('uploads/galeri', $namaThumbnail);

        $this->videoModel->insert([
            'judul'        => $this->request->getPost('judul'),
            'link_youtube' => $this->request->getPost('link_youtube'),
            'keterangan'   => $this->request->getPost('keterangan'),
            'thumbnail'    => $namaThumbnail,
            'penulis_id'   => session()->get('id')
        ]);

        return redirect()->to('/admin/galeri_video')->with('success', 'Video berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'  => 'Edit Video',
            'galeri' => $this->videoModel->find($id)
        ];
        return view('admin/galeri_video/edit', $data);
    }

    public function update($id)
    {
        $galeri = $this->videoModel->find($id);
        $dataUpdate = [
            'judul'        => $this->request->getPost('judul'),
            'link_youtube' => $this->request->getPost('link_youtube'),
            'keterangan'   => $this->request->getPost('keterangan')
        ];

        $thumbnail = $this->request->getFile('thumbnail');
        if ($thumbnail && $thumbnail->isValid() && !$thumbnail->hasMoved()) {
            $namaThumbnail = $thumbnail->getRandomName();
            $thumbnail->move('uploads/galeri', $namaThumbnail);
            $dataUpdate['thumbnail'] = $namaThumbnail;
            if ($galeri['thumbnail'] && file_exists('uploads/galeri/' . $galeri['thumbnail'])) {
                unlink('uploads/galeri/' . $galeri['thumbnail']);
            }
        }

        $this->videoModel->update($id, $dataUpdate);
        return redirect()->to('/admin/galeri_video')->with('success', 'Video berhasil diperbarui.');
    }

    public function delete($id)
    {
        $galeri = $this->videoModel->find($id);
        if ($galeri['thumbnail'] && file_exists('uploads/galeri/' . $galeri['thumbnail'])) {
            unlink('uploads/galeri/' . $galeri['thumbnail']);
        }
        $this->videoModel->delete($id);
        return redirect()->to('/admin/galeri_video')->with('success', 'Video berhasil dihapus.');
    }
}