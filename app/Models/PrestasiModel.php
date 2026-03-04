<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestasiModel extends Model
{
    protected $table            = 'prestasi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul', 'kategori_id', 'nama_penerima', 'penyelenggara', 'hadiah', 'tgl_penerimaan', 'keterangan'];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    public function getPrestasiWithKategori()
    {
        return $this->select('prestasi.*, kategori_prestasi.nama_kategori')
                    ->join('kategori_prestasi', 'kategori_prestasi.id = prestasi.kategori_id')
                    ->orderBy('prestasi.tgl_penerimaan', 'DESC')
                    ->findAll();
    }
}