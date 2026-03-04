<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table            = 'berita';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul', 'slug', 'foto', 'kategori_id', 'status_publish', 'tgl_publish', 'isi', 'seo_keywords', 'penulis_id'];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getBeritaLengkap()
    {
        return $this->select('berita.*, kategori_berita.nama_kategori, users.nama_lengkap as nama_penulis')
                    ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
                    ->join('users', 'users.id = berita.penulis_id')
                    ->orderBy('berita.tgl_publish', 'DESC')
                    ->findAll();
    }
}