<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProfilSekolahModel;

class ProfilSekolah extends BaseController
{
    protected $profilModel;

    public function __construct()
    {
        $this->profilModel = new ProfilSekolahModel();
    }

    public function edit()
    {
        $data = [
            'title'  => 'Edit Profil Sekolah',
            'profil' => $this->profilModel->first()
        ];
        return view('admin/profil_sekolah/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $profil = $this->profilModel->find($id);

        $dataUpdate = [
            'nama_sekolah' => $this->request->getPost('nama_sekolah'),
            'nama_kepsek'  => $this->request->getPost('nama_kepsek'),
            'nip_kepsek'   => $this->request->getPost('nip_kepsek'),
            'sejarah'      => $this->request->getPost('sejarah'),
            'visi'         => $this->request->getPost('visi'),
            'misi'         => $this->request->getPost('misi'),
            'akreditasi'   => $this->request->getPost('akreditasi'),
            'kurikulum'    => $this->request->getPost('kurikulum'),
            'alamat'       => $this->request->getPost('alamat'),
            'peta'         => $this->request->getPost('peta'),
            'no_telp'      => $this->request->getPost('no_telp'),
            'email'        => $this->request->getPost('email'),
            'youtube'      => $this->request->getPost('youtube'),
            'facebook'     => $this->request->getPost('facebook'),
            'instagram'    => $this->request->getPost('instagram'),
            'twitter'      => $this->request->getPost('twitter'),
        ];

        $logo = $this->request->getFile('logo');
        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $namaLogo = $logo->getRandomName();
            $logo->move('uploads/logo', $namaLogo);
            $dataUpdate['logo'] = $namaLogo;
            if ($profil['logo'] && file_exists('uploads/logo/' . $profil['logo'])) {
                unlink('uploads/logo/' . $profil['logo']);
            }
        }

        $fotoKepsek = $this->request->getFile('foto_kepsek');
        if ($fotoKepsek && $fotoKepsek->isValid() && !$fotoKepsek->hasMoved()) {
            $namaFotoKepsek = $fotoKepsek->getRandomName();
            $fotoKepsek->move('uploads/profil', $namaFotoKepsek);
            $dataUpdate['foto_kepsek'] = $namaFotoKepsek;
            if ($profil['foto_kepsek'] && file_exists('uploads/profil/' . $profil['foto_kepsek'])) {
                unlink('uploads/profil/' . $profil['foto_kepsek']);
            }
        }

        $this->profilModel->update($id, $dataUpdate);
        return redirect()->to('/admin/profil_sekolah/edit')->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}