<?php
namespace App\Models;

use CodeIgniter\Model;

class Supply extends Model
{
    protected $table = 'supply';
    protected $primaryKey = 'id_supply';
    public function getSupply()
    {
        return $this->findAll();
    }
}
