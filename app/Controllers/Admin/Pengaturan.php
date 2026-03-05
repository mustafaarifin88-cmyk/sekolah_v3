<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengaturanModel;

class Pengaturan extends BaseController
{
    protected $pengaturanModel;

    public function __construct()
    {
        $this->pengaturanModel = new PengaturanModel();
    }

    public function warna_bg()
    {
        $data = [
            'title'      => 'Pengaturan Warna Tema',
            'pengaturan' => $this->pengaturanModel->first()
        ];
        return view('admin/pengaturan/warna_bg', $data);
    }

    public function update_warna()
    {
        $id = $this->request->getPost('id');
        $this->pengaturanModel->update($id, [
            'warna_bg'     => $this->request->getPost('warna_bg'),
            'warna_header' => $this->request->getPost('warna_header')
        ]);
        return redirect()->to('/admin/pengaturan/warna_bg')->with('success', 'Pengaturan warna berhasil diperbarui.');
    }
}