<?php

namespace App\Models;

use CodeIgniter\Model;

class EskulModel extends Model
{
    protected $table            = 'ekstrakurikuler';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_ekstrakurikuler', 'foto', 'nama_guru_pembimbing', 'kategori_id', 'keterangan'];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    public function getEskulWithKategori()
    {
        return $this->select('ekstrakurikuler.*, kategori_ekstrakurikuler.nama_kategori')
                    ->join('kategori_ekstrakurikuler', 'kategori_ekstrakurikuler.id = ekstrakurikuler.kategori_id')
                    ->orderBy('ekstrakurikuler.id', 'DESC')
                    ->findAll();
    }
}