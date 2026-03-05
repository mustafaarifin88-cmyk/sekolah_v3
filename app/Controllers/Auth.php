<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('logged_in')) {
            return redirect()->to(session()->get('role') == 'admin' ? '/admin/dashboard' : '/guru/dashboard');
        }

        return view('auth/login', $this->globalData);
    }

    public function process()
    {
        $usersModel = new UsersModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $usersModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'id'           => $user['id'],
                    'role'         => $user['role'],
                    'username'     => $user['username'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'foto_profil'  => $user['foto_profil'],
                    'kelas_id'     => $user['kelas_id'],
                    'logged_in'    => true
                ];
                session()->set($sessionData);

                if ($user['role'] == 'admin') {
                    return redirect()->to('/admin/dashboard');
                } else {
                    return redirect()->to('/guru/dashboard');
                }
            } else {
                return redirect()->back()->with('error', 'Password salah!');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak ditemukan!');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}