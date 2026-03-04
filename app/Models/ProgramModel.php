<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramModel extends Model
{
    protected $table            = 'program_unggulan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul', 'foto', 'kategori_id', 'keterangan'];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    public function getProgramWithKategori()
    {
        return $this->select('program_unggulan.*, kategori_program.nama_kategori')
                    ->join('kategori_program', 'kategori_program.id = program_unggulan.kategori_id')
                    ->orderBy('program_unggulan.id', 'DESC')
                    ->findAll();
    }
}