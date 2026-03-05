<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\KotakSaranModel;

class Kontak extends BaseController
{
    public function index()
    {
        $data = array_merge($this->globalData, ['title' => 'Kontak & Interaksi']);
        return view('frontend/kontak/index', $data);
    }

    public function simpan_saran()
    {
        $rules = [
            'nama'  => 'required',
            'email' => 'valid_email',
            'pesan' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $saranModel = new KotakSaranModel();
        $saranModel->insert([
            'nama'  => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'pesan' => $this->request->getPost('pesan')
        ]);

        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim.');
    }
}