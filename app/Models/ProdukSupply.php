<?php
namespace App\Models;

use CodeIgniter\Model;

class ProdukSupply extends Model
{
    protected $table = 'produk_supply';
    protected $primaryKey = 'id_produkSupply';
    public function getProdukSupply()
    {
        return $this->findAll();
    }
}
