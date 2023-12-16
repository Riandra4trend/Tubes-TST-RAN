<?php
namespace App\Models;

use CodeIgniter\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public function getTransaksi()
    {
        return $this->findAll();
    }
}
