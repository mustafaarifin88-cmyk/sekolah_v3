<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriPengumumanModel extends Model
{
    protected $table            = 'kategori_pengumuman';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_kategori', 'keterangan'];

    protected bool $allowEmptyInserts = false;
    protected $useTimestamps = false;
}