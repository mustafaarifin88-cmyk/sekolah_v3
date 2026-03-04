<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilSekolahModel extends Model
{
    protected $table            = 'profil_sekolah';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['logo', 'nama_sekolah', 'foto_kepsek', 'nama_kepsek', 'nip_kepsek', 'sejarah', 'visi', 'misi', 'akreditasi', 'kurikulum', 'alamat', 'peta', 'no_telp', 'email', 'youtube', 'facebook', 'instagram', 'twitter'];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = '';
    protected $updatedField  = 'updated_at';
}