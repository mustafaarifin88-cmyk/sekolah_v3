<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\StrukturModel;
use App\Models\FasilitasModel;
use App\Models\KategoriFasilitasModel;

class Profil extends BaseController
{
    public function sejarah()
    {
        $data = array_merge($this->globalData, ['title' => 'Sejarah Sekolah']);
        return view('frontend/profil/sejarah', $data);
    }

    public function visi_misi()
    {
        $data = array_merge($this->globalData, ['title' => 'Visi & Misi']);
        return view('frontend/profil/visi_misi', $data);
    }

    public function struktur()
    {
        $strukturModel = new StrukturModel();
        $data = array_merge($this->globalData, [
            'title'    => 'Struktur Organisasi',
            'struktur' => $strukturModel->findAll()
        ]);
        return view('frontend/profil/struktur', $data);
    }

    public function fasilitas_list()
    {
        $fasilitasModel = new FasilitasModel();
        $kategoriModel = new KategoriFasilitasModel();
        $data = array_merge($this->globalData, [
            'title'     => 'Fasilitas Sekolah',
            'kategori'  => $kategoriModel->findAll(),
            'fasilitas' => $fasilitasModel->getFasilitasWithKategori()
        ]);
        return view('frontend/profil/fasilitas_list', $data);
    }

    public function fasilitas_detail($id)
    {
        $fasilitasModel = new FasilitasModel();
        $fasilitas = $fasilitasModel->select('fasilitas.*, kategori_fasilitas.nama_kategori')
                                    ->join('kategori_fasilitas', 'kategori_fasilitas.id = fasilitas.kategori_id')
                                    ->where('fasilitas.id', $id)
                                    ->first();

        if (!$fasilitas) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = array_merge($this->globalData, [
            'title'     => $fasilitas['judul'],
            'fasilitas' => $fasilitas
        ]);
        return view('frontend/profil/fasilitas_detail', $data);
    }

    public function akreditasi()
    {
        $data = array_merge($this->globalData, ['title' => 'Akreditasi']);
        return view('frontend/profil/akreditasi', $data);
    }
}