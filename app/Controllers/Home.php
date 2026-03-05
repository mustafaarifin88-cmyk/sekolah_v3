<?php

namespace App\Controllers;

use App\Models\SlideShowModel;
use App\Models\PrestasiModel;
use App\Models\ProgramModel;

class Home extends BaseController
{
    public function index()
    {
        $slideModel = new SlideShowModel();
        $prestasiModel = new PrestasiModel();
        $programModel = new ProgramModel();

        $data = array_merge($this->globalData, [
            'title'    => 'Beranda',
            'slides'   => $slideModel->findAll(),
            'prestasi' => $prestasiModel->select('prestasi.*, kategori_prestasi.nama_kategori')
                                        ->join('kategori_prestasi', 'kategori_prestasi.id = prestasi.kategori_id')
                                        ->orderBy('tgl_penerimaan', 'DESC')
                                        ->findAll(6),
            'program'  => $programModel->select('program_unggulan.*, kategori_program.nama_kategori')
                                        ->join('kategori_program', 'kategori_program.id = program_unggulan.kategori_id')
                                        ->orderBy('program_unggulan.id', 'DESC')
                                        ->findAll(6)
        ]);

        return view('frontend/home/index', $data);
    }
}