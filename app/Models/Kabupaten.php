<?php

namespace App\Models;

use CodeIgniter\Model;

class Kabupaten extends Model
{
    protected $table            = 't_kabupaten';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
}
