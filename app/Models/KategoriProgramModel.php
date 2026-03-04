<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriProgramModel extends Model
{
    protected $table            = 'kategori_program';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_kategori', 'keterangan'];

    protected bool $allowEmptyInserts = false;
    protected $useTimestamps = false;
}