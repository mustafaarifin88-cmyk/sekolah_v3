<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SlideShowModel;

class SlideShow extends BaseController
{
    protected $slideModel;

    public function __construct()
    {
        $this->slideModel = new SlideShowModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Slide Show',
            'slides' => $this->slideModel->findAll()
        ];
        return view('admin/slideshow/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Slide Show'];
        return view('admin/slideshow/create', $data);
    }

    public function store()
    {
        $foto = $this->request->getFile('foto');
        
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/slideshow', $namaFoto);
            
            $this->slideModel->insert([
                'foto'       => $namaFoto,
                'judul'      => $this->request->getPost('judul'),
                'keterangan' => $this->request->getPost('keterangan')
            ]);
            
            return redirect()->to('/admin/slideshow')->with('success', 'Slide show berhasil ditambahkan.');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah foto.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Slide Show',
            'slide' => $this->slideModel->find($id)
        ];
        return view('admin/slideshow/edit', $data);
    }

    public function update($id)
    {
        $slide = $this->slideModel->find($id);
        
        $dataUpdate = [
            'judul'      => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/slideshow', $namaFoto);
            $dataUpdate['foto'] = $namaFoto;
            
            if ($slide['foto'] && file_exists('uploads/slideshow/' . $slide['foto'])) {
                unlink('uploads/slideshow/' . $slide['foto']);
            }
        }

        $this->slideModel->update($id, $dataUpdate);
        return redirect()->to('/admin/slideshow')->with('success', 'Data slide show berhasil diperbarui.');
    }

    public function delete($id)
    {
        $slide = $this->slideModel->find($id);
        if ($slide['foto'] && file_exists('uploads/slideshow/' . $slide['foto'])) {
            unlink('uploads/slideshow/' . $slide['foto']);
        }
        $this->slideModel->delete($id);
        return redirect()->to('/admin/slideshow')->with('success', 'Foto slide show berhasil dihapus.');
    }
}