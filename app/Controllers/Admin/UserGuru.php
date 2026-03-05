<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\KelasModel;

class UserGuru extends BaseController
{
    protected $usersModel;
    protected $kelasModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Guru',
            'guru'  => $this->usersModel->where('role', 'guru')->findAll()
        ];
        return view('admin/user_guru/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah User Guru',
            'kelas' => $this->kelasModel->findAll()
        ];
        return view('admin/user_guru/create', $data);
    }

    public function store()
    {
        $dataInsert = [
            'role'         => 'guru',
            'username'     => $this->request->getPost('username'),
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'jabatan'      => $this->request->getPost('jabatan'),
            'kelas_id'     => $this->request->getPost('kelas_id') ?: null
        ];

        $foto = $this->request->getFile('foto_profil');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/profil', $namaFoto);
            $dataInsert['foto_profil'] = $namaFoto;
        }

        $this->usersModel->insert($dataInsert);
        return redirect()->to('/admin/user_guru')->with('success', 'User Guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User Guru',
            'guru'  => $this->usersModel->find($id),
            'kelas' => $this->kelasModel->findAll()
        ];
        return view('admin/user_guru/edit', $data);
    }

    public function update($id)
    {
        $guru = $this->usersModel->find($id);
        
        $dataUpdate = [
            'username'     => $this->request->getPost('username'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'jabatan'      => $this->request->getPost('jabatan'),
            'kelas_id'     => $this->request->getPost('kelas_id') ?: null
        ];

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
        }

        $this->usersModel->update($id, $dataUpdate);
        return redirect()->to('/admin/user_guru')->with('success', 'User Guru berhasil diperbarui.');
    }

    public function delete($id)
    {
        $guru = $this->usersModel->find($id);
        if ($guru['foto_profil'] && file_exists('uploads/profil/' . $guru['foto_profil'])) {
            unlink('uploads/profil/' . $guru['foto_profil']);
        }
        $this->usersModel->delete($id);
        return redirect()->to('/admin/user_guru')->with('success', 'User Guru berhasil dihapus.');
    }
}