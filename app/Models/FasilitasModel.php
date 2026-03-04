<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
    protected $table            = 'fasilitas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul', 'foto', 'kondisi', 'tgl_masuk', 'kategori_id', 'keterangan'];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    public function getFasilitasWithKategori()
    {
        return $this->select('fasilitas.*, kategori_fasilitas.nama_kategori')
                    ->join('kategori_fasilitas', 'kategori_fasilitas.id = fasilitas.kategori_id')
                    ->orderBy('fasilitas.id', 'DESC')
                    ->findAll();
    }
}