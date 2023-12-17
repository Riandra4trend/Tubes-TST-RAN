<?php
namespace App\Models;

use CodeIgniter\Model;

class Kurir extends Model
{
    protected $table = 'data_kurir';
    protected $primaryKey = 'id_kurir';
    public function getKurir()
    {
        return $this->findAll();
    }
}
