<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KotakSaranModel;

class KotakSaran extends BaseController
{
    protected $saranModel;

    public function __construct()
    {
        $this->saranModel = new KotakSaranModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kotak Saran',
            'saran' => $this->saranModel->orderBy('created_at', 'DESC')->findAll()
        ];
        return view('admin/kotak_saran/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Saran',
            'saran' => $this->saranModel->find($id)
        ];
        return view('admin/kotak_saran/detail', $data);
    }

    public function delete($id)
    {
        $this->saranModel->delete($id);
        return redirect()->to('/admin/kotak_saran')->with('success', 'Pesan saran berhasil dihapus.');
    }
}