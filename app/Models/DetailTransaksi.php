<?php
namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail_transaksi';
    public function getDetailTransaksi()
    {
        return $this->findAll();
    }
}
