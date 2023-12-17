<?php
namespace App\Models;

use CodeIgniter\Model;

class Karyawan extends Model
{
    protected $table = 'data_karyawan';
    protected $primaryKey = 'id_karyawan';
    public function getKaryawan()
    {
        return $this->findAll();
    }
}
