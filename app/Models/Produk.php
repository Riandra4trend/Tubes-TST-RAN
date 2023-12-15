<?php
namespace App\Models;
use CodeIgniter\Model;
class Produk extends Model{
    protected $table = 'detail_produk';
    public function getProduk(){
        return $this->findAll();
    }
}
