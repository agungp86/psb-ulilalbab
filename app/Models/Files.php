<?php

namespace App\Models;

use CodeIgniter\Model;

class Files extends Model
{
    protected $table            = 'files';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['jenis', 'path', 'id_siswa', 'created_at'];


    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';

    public function getAllByUserId($Id)
    {
        return $this->where('id_siswa', $Id)->findAll(); // Return all matching records
    }

    public function getAllByUserType($Type)
    {
        return $this->where('id_siswa', $Type)->findAll(); // Return all matching records
    }

     // Method to create a new record with 3 parameters
     public function createData($Jenis, $path, $id_siswa)
     {
         $data = [
             'jenis' => $Jenis,
             'path' => $path,
             'id_siswa' => $id_siswa
         ];
 
         return $this->insert($data); // Insert data and return the result (ID of the inserted row)
     }
}
