<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UserAdmin extends BaseController
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Admin',
            'admin' => $this->usersModel->where('role', 'admin')->findAll()
        ];
        return view('admin/user_admin/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah User Admin'];
        return view('admin/user_admin/create', $data);
    }

    public function store()
    {
        $dataInsert = [
            'role'         => 'admin',
            'username'     => $this->request->getPost('username'),
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama_lengkap' => $this->request->getPost('nama_lengkap')
        ];

        $foto = $this->request->getFile('foto_profil');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/profil', $namaFoto);
            $dataInsert['foto_profil'] = $namaFoto;
        }

        $this->usersModel->insert($dataInsert);
        return redirect()->to('/admin/user_admin')->with('success', 'User Admin berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User Admin',
            'admin' => $this->usersModel->find($id)
        ];
        return view('admin/user_admin/edit', $data);
    }

    public function update($id)
    {
        $admin = $this->usersModel->find($id);
        
        $dataUpdate = [
            'username'     => $this->request->getPost('username'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap')
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
            if ($admin['foto_profil'] && file_exists('uploads/profil/' . $admin['foto_profil'])) {
                unlink('uploads/profil/' . $admin['foto_profil']);
            }
        }

        $this->usersModel->update($id, $dataUpdate);
        return redirect()->to('/admin/user_admin')->with('success', 'User Admin berhasil diperbarui.');
    }

    public function delete($id)
    {
        $admin = $this->usersModel->find($id);
        if ($admin['foto_profil'] && file_exists('uploads/profil/' . $admin['foto_profil'])) {
            unlink('uploads/profil/' . $admin['foto_profil']);
        }
        $this->usersModel->delete($id);
        return redirect()->to('/admin/user_admin')->with('success', 'User Admin berhasil dihapus.');
    }
}