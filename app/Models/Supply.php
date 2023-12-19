<?php
namespace App\Models;

use CodeIgniter\Model;

class Supply extends Model
{
    protected $table = 'supply';
    protected $primaryKey = 'id_supply';
    protected $allowedFields = ['id_supply', 'id_kurir', 'status_pengiriman', 'status_pembayaran'];
    public function getSupply()
    {
        return $this->findAll();
    }
}
