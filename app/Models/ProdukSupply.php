<?php
namespace App\Models;

use CodeIgniter\Model;

class ProdukSupply extends Model
{
    protected $table = 'produk_supply';
    protected $primaryKey = 'id_produkSupply';
    protected $allowedFields = ['id_produkSupply', 'id_produk', 'id_supply', 'id_cabang'];
    public function getProdukSupply()
    {
        return $this->findAll();
    }
}
