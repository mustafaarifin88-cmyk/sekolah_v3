<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UnduhanModel;

class Unduhan extends BaseController
{
    protected $unduhanModel;

    public function __construct()
    {
        $this->unduhanModel = new UnduhanModel();
    }

    public function index()
    {
        $data = [
            'title'   => 'Pusat Unduhan',
            'unduhan' => $this->unduhanModel->findAll()
        ];
        return view('admin/unduhan/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah File Unduhan'];
        return view('admin/unduhan/create', $data);
    }

    public function store()
    {
        $file = $this->request->getFile('file_path');
        $namaFile = $file->getRandomName();
        $file->move('uploads/dokumen', $namaFile);

        $this->unduhanModel->insert([
            'judul'      => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan'),
            'file_path'  => $namaFile
        ]);

        return redirect()->to('/admin/unduhan')->with('success', 'File berhasil diunggah.');
    }

    public function edit($id)
    {
        $data = [
            'title'   => 'Edit File Unduhan',
            'unduhan' => $this->unduhanModel->find($id)
        ];
        return view('admin/unduhan/edit', $data);
    }

    public function update($id)
    {
        $unduhan = $this->unduhanModel->find($id);
        $dataUpdate = [
            'judul'      => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $file = $this->request->getFile('file_path');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaFile = $file->getRandomName();
            $file->move('uploads/dokumen', $namaFile);
            $dataUpdate['file_path'] = $namaFile;
            if ($unduhan['file_path'] && file_exists('uploads/dokumen/' . $unduhan['file_path'])) {
                unlink('uploads/dokumen/' . $unduhan['file_path']);
            }
        }

        $this->unduhanModel->update($id, $dataUpdate);
        return redirect()->to('/admin/unduhan')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $unduhan = $this->unduhanModel->find($id);
        if ($unduhan['file_path'] && file_exists('uploads/dokumen/' . $unduhan['file_path'])) {
            unlink('uploads/dokumen/' . $unduhan['file_path']);
        }
        $this->unduhanModel->delete($id);
        return redirect()->to('/admin/unduhan')->with('success', 'Data berhasil dihapus.');
    }
}