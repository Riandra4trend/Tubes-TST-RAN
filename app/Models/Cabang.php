<?php
namespace App\Models;

use CodeIgniter\Model;

class Cabang extends Model
{
    protected $table = 'data_cabang';
    protected $primaryKey = 'id_cabang';
    public function getCabang()
    {
        return $this->findAll();
    }
}
