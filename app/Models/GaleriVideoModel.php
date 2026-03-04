<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriVideoModel extends Model
{
    protected $table            = 'galeri_video';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul', 'thumbnail', 'link_youtube', 'keterangan', 'penulis_id'];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    public function getVideoWithPenulis()
    {
        return $this->select('galeri_video.*, users.nama_lengkap as nama_penulis')
                    ->join('users', 'users.id = galeri_video.penulis_id')
                    ->orderBy('galeri_video.id', 'DESC')
                    ->findAll();
    }
}