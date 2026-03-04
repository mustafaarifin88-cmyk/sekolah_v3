<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $table            = 'pengumuman';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul', 'slug', 'kategori_id', 'status_publish', 'tgl_publish', 'isi', 'penulis_id'];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPengumumanLengkap()
    {
        return $this->select('pengumuman.*, kategori_pengumuman.nama_kategori, users.nama_lengkap as nama_penulis')
                    ->join('kategori_pengumuman', 'kategori_pengumuman.id = pengumuman.kategori_id')
                    ->join('users', 'users.id = pengumuman.penulis_id')
                    ->orderBy('pengumuman.tgl_publish', 'DESC')
                    ->findAll();
    }
}