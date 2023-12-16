<?php
namespace App\Models;

use CodeIgniter\Model;

class Produk extends Model
{
    protected $table = 'detail_produk';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['id_produk', 'batas_bawah', 'kuantitas_restock'];
    public function getProduk()
    {
        return $this->findAll();
    }


    public function getProdukById($id)
    {
        return $this->where('id_produk', $id)->first();
    }
}
