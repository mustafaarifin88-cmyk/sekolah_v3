<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table            = 'agenda';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul', 'kategori_id', 'foto', 'keterangan'];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    public function getAgendaWithKategori()
    {
        return $this->select('agenda.*, kategori_agenda.nama_kategori')
                    ->join('kategori_agenda', 'kategori_agenda.id = agenda.kategori_id')
                    ->orderBy('agenda.id', 'DESC')
                    ->findAll();
    }
}