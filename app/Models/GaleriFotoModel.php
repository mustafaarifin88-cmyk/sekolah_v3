<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriFotoModel extends Model
{
    protected $table            = 'galeri_foto';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul', 'foto', 'keterangan', 'penulis_id'];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    public function getGaleriWithPenulis()
    {
        return $this->select('galeri_foto.*, users.nama_lengkap as nama_penulis')
                    ->join('users', 'users.id = galeri_foto.penulis_id')
                    ->orderBy('galeri_foto.id', 'DESC')
                    ->findAll();
    }
}