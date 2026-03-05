<?php

namespace App\Models;

use CodeIgniter\Model

class PengaturanModel extends Model
{
    protected $table            = 'pengaturan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['warna_bg'];

    protected bool $allowEmptyInserts = false;
    protected $useTimestamps = false;
}