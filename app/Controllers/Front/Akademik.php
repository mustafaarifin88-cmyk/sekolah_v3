<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\KalenderModel;
use App\Models\ProgramModel;
use App\Models\EskulModel;

class Akademik extends BaseController
{
    public function kurikulum()
    {
        $data = array_merge($this->globalData, ['title' => 'Data Kurikulum']);
        return view('frontend/akademik/kurikulum', $data);
    }

    public function kalender()
    {
        $kalenderModel = new KalenderModel();
        $data = array_merge($this->globalData, [
            'title'    => 'Kalender Pendidikan',
            'kalender' => $kalenderModel->orderBy('id', 'DESC')->findAll()
        ]);
        return view('frontend/akademik/kalender', $data);
    }

    public function program_list()
    {
        $programModel = new ProgramModel();
        $data = array_merge($this->globalData, [
            'title'   => 'Program Unggulan',
            'program' => $programModel->getProgramWithKategori()
        ]);
        return view('frontend/akademik/program_list', $data);
    }

    public function program_detail($id)
    {
        $programModel = new ProgramModel();
        $program = $programModel->select('program_unggulan.*, kategori_program.nama_kategori')
                                ->join('kategori_program', 'kategori_program.id = program_unggulan.kategori_id')
                                ->where('program_unggulan.id', $id)
                                ->first();

        if (!$program) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = array_merge($this->globalData, [
            'title'   => $program['judul'],
            'program' => $program
        ]);
        return view('frontend/akademik/program_detail', $data);
    }

    public function eskul_list()
    {
        $eskulModel = new EskulModel();
        $data = array_merge($this->globalData, [
            'title' => 'Ekstrakurikuler',
            'eskul' => $eskulModel->getEskulWithKategori()
        ]);
        return view('frontend/akademik/eskul_list', $data);
    }

    public function eskul_detail($id)
    {
        $eskulModel = new EskulModel();
        $eskul = $eskulModel->select('ekstrakurikuler.*, kategori_ekstrakurikuler.nama_kategori')
                            ->join('kategori_ekstrakurikuler', 'kategori_ekstrakurikuler.id = ekstrakurikuler.kategori_id')
                            ->where('ekstrakurikuler.id', $id)
                            ->first();

        if (!$eskul) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = array_merge($this->globalData, [
            'title' => $eskul['nama_ekstrakurikuler'],
            'eskul' => $eskul
        ]);
        return view('frontend/akademik/eskul_detail', $data);
    }
}