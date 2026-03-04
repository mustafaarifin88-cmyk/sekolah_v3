<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table            = 'siswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nisn', 'nama_lengkap', 'kelas_id', 'alamat', 'jenis_kelamin', 'agama'];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    public function getSiswaWithKelas()
    {
        return $this->select('siswa.*, kelas.nama_kelas')
                    ->join('kelas', 'kelas.id = siswa.kelas_id')
                    ->orderBy('siswa.nama_lengkap', 'ASC')
                    ->findAll();
    }
}