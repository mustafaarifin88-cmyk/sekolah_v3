<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\SiswaModel;

class Siswa extends BaseController
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $kelas_id = session()->get('kelas_id');
        
        if (empty($kelas_id)) {
            return redirect()->to('/guru/dashboard')->with('error', 'Anda bukan wali kelas, menu ini tidak dapat diakses.');
        }

        $data = [
            'title' => 'Data Siswa Wali Kelas',
            'siswa' => $this->siswaModel->where('kelas_id', $kelas_id)->findAll()
        ];
        return view('guru/siswa/index', $data);
    }

    public function edit($id)
    {
        $kelas_id = session()->get('kelas_id');
        $siswa = $this->siswaModel->find($id);

        if (empty($kelas_id) || $siswa['kelas_id'] != $kelas_id) {
            return redirect()->to('/guru/siswa')->with('error', 'Anda tidak memiliki hak akses untuk mengedit data siswa ini.');
        }

        $data = [
            'title' => 'Edit Data Siswa',
            'siswa' => $siswa
        ];
        return view('guru/siswa/edit', $data);
    }

    public function update($id)
    {
        $kelas_id = session()->get('kelas_id');
        $siswa = $this->siswaModel->find($id);

        if (empty($kelas_id) || $siswa['kelas_id'] != $kelas_id) {
            return redirect()->to('/guru/siswa')->with('error', 'Akses ditolak.');
        }

        $this->siswaModel->update($id, [
            'nisn'          => $this->request->getPost('nisn'),
            'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
            'alamat'        => $this->request->getPost('alamat'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'agama'         => $this->request->getPost('agama')
        ]);
        
        return redirect()->to('/guru/siswa')->with('success', 'Data siswa berhasil diperbarui.');
    }
}