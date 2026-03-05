<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Profil extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function edit()
    {
        $id = session()->get('id');
        $data = [
            'title' => 'Edit Profil',
            'guru'  => $this->usersModel->find($id)
        ];
        return view('guru/profil/edit', $data);
    }

    public function update()
    {
        $id = session()->get('id');
        $guru = $this->usersModel->find($id);
        
        $dataUpdate = [];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $dataUpdate['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $foto = $this->request->getFile('foto_profil');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/profil', $namaFoto);
            $dataUpdate['foto_profil'] = $namaFoto;
            
            if ($guru['foto_profil'] && file_exists('uploads/profil/' . $guru['foto_profil'])) {
                unlink('uploads/profil/' . $guru['foto_profil']);
            }
            
            session()->set('foto_profil', $namaFoto);
        }

        if (!empty($dataUpdate)) {
            $this->usersModel->update($id, $dataUpdate);
        }

        return redirect()->to('/guru/profil/edit')->with('success', 'Profil berhasil diperbarui.');
    }
}