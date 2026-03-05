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
            'prestasi' => $prestasiModel->orderBy('tgl_penerimaan', 'DESC')->findAll(6),
            'program'  => $programModel->orderBy('id', 'DESC')->findAll(6)
        ]);

        return view('frontend/home/index', $data);
    }
}