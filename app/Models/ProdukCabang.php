<?php
namespace App\Models;

use CodeIgniter\Model;

class ProdukCabang extends Model
{
    protected $table = 'produk_cabang';
    protected $primaryKey = 'id_produkCabang';
    public function getProdukCabang()
    {
        return $this->findAll();
    }
}
