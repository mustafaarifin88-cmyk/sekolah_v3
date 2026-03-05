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
        if ($files = $this->request->getFiles()) {
            foreach ($files['foto'] as $foto) {
                if ($foto->isValid() && !$foto->hasMoved()) {
                    $namaFoto = $foto->getRandomName();
                    $foto->move('uploads/slideshow', $namaFoto);
                    $this->slideModel->insert(['foto' => $namaFoto]);
                }
            }
            return redirect()->to('/admin/slideshow')->with('success', 'Foto slide show berhasil diunggah.');
        }
        
        return redirect()->back()->with('error', 'Silakan pilih foto terlebih dahulu.');
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