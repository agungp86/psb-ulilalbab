<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'siswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama',
        'jk',
        'jalur',
        'tempat_lahir',
        'tgl_lahir',
        'nisn',
        'ortu',
        'telp_ortu',
        'prov1',
        'kabko1',
        'kec1',
        'kelurahan1',
        'detail_alamat',
        'nama_sekolah',
        'prov2',
        'kabko2',
        'kec2',
        'kelurahan2',
        'pendukung',
        'k_pelajar',
        'foto',
        'info',
        'approve',
        'stage',
        'bukti_tf',
        'noreg',
        'created_at'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
}
