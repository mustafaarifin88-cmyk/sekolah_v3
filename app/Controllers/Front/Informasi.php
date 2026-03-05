<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\PengumumanModel;
use App\Models\GaleriFotoModel;
use App\Models\GaleriVideoModel;
use App\Models\PrestasiModel;
use App\Models\AgendaModel;

class Informasi extends BaseController
{
    public function berita_list()
    {
        $beritaModel = new BeritaModel();
        $data = array_merge($this->globalData, [
            'title'  => 'Berita Sekolah',
            'berita' => $beritaModel->where('status_publish', 'publish')
                                    ->where('tgl_publish <=', date('Y-m-d H:i:s'))
                                    ->orderBy('tgl_publish', 'DESC')
                                    ->findAll()
        ]);
        return view('frontend/informasi/berita_list', $data);
    }

    public function berita_detail($slug)
    {
        $beritaModel = new BeritaModel();
        $berita = $beritaModel->select('berita.*, kategori_berita.nama_kategori, users.nama_lengkap as nama_penulis')
                              ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                              ->join('users', 'users.id = berita.penulis_id')
                              ->where('berita.slug', $slug)
                              ->first();

        if (!$berita) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = array_merge($this->globalData, [
            'title'  => $berita['judul'],
            'berita' => $berita
        ]);
        return view('frontend/informasi/berita_detail', $data);
    }

    public function pengumuman_list()
    {
        $pengumumanModel = new PengumumanModel();
        $data = array_merge($this->globalData, [
            'title'      => 'Pengumuman',
            'pengumuman' => $pengumumanModel->where('status_publish', 'publish')
                                            ->where('tgl_publish <=', date('Y-m-d H:i:s'))
                                            ->orderBy('tgl_publish', 'DESC')
                                            ->findAll()
        ]);
        return view('frontend/informasi/pengumuman_list', $data);
    }

    public function pengumuman_detail($slug)
    {
        $pengumumanModel = new PengumumanModel();
        $pengumuman = $pengumumanModel->select('pengumuman.*, kategori_pengumuman.nama_kategori, users.nama_lengkap as nama_penulis')
                                      ->join('kategori_pengumuman', 'kategori_pengumuman.id = pengumuman.kategori_id')
                                      ->join('users', 'users.id = pengumuman.penulis_id')
                                      ->where('pengumuman.slug', $slug)
                                      ->first();

        if (!$pengumuman) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = array_merge($this->globalData, [
            'title'      => $pengumuman['judul'],
            'pengumuman' => $pengumuman
        ]);
        return view('frontend/informasi/pengumuman_detail', $data);
    }

    public function galeri_foto()
    {
        $galeriModel = new GaleriFotoModel();
        $data = array_merge($this->globalData, [
            'title'  => 'Galeri Foto',
            'galeri' => $galeriModel->orderBy('id', 'DESC')->findAll()
        ]);
        return view('frontend/informasi/galeri_foto', $data);
    }

    public function galeri_video()
    {
        $videoModel = new GaleriVideoModel();
        $data = array_merge($this->globalData, [
            'title'  => 'Galeri Video',
            'galeri' => $videoModel->orderBy('id', 'DESC')->findAll()
        ]);
        return view('frontend/informasi/galeri_video', $data);
    }

    public function prestasi_list()
    {
        $prestasiModel = new PrestasiModel();
        $data = array_merge($this->globalData, [
            'title'    => 'Prestasi Siswa & Guru',
            'prestasi' => $prestasiModel->getPrestasiWithKategori()
        ]);
        return view('frontend/informasi/prestasi_list', $data);
    }

    public function prestasi_detail($id)
    {
        $prestasiModel = new PrestasiModel();
        $prestasi = $prestasiModel->select('prestasi.*, kategori_prestasi.nama_kategori')
                                  ->join('kategori_prestasi', 'kategori_prestasi.id = prestasi.kategori_id')
                                  ->where('prestasi.id', $id)
                                  ->first();

        if (!$prestasi) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = array_merge($this->globalData, [
            'title'    => $prestasi['judul'],
            'prestasi' => $prestasi
        ]);
        return view('frontend/informasi/prestasi_detail', $data);
    }

    public function agenda_list()
    {
        $agendaModel = new AgendaModel();
        $data = array_merge($this->globalData, [
            'title'  => 'Agenda Kegiatan',
            'agenda' => $agendaModel->getAgendaWithKategori()
        ]);
        return view('frontend/informasi/agenda_list', $data);
    }

    public function agenda_detail($id)
    {
        $agendaModel = new AgendaModel();
        $agenda = $agendaModel->select('agenda.*, kategori_agenda.nama_kategori')
                              ->join('kategori_agenda', 'kategori_agenda.id = agenda.kategori_id')
                              ->where('agenda.id', $id)
                              ->first();

        if (!$agenda) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $data = array_merge($this->globalData, [
            'title'  => $agenda['judul'],
            'agenda' => $agenda
        ]);
        return view('frontend/informasi/agenda_detail', $data);
    }
}