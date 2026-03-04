<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriEskulModel extends Model
{
    protected $table            = 'kategori_ekstrakurikuler';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_kategori', 'keterangan'];

    protected bool $allowEmptyInserts = false;
    protected $useTimestamps = false;
}