<?php
namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail_transaksi';
    protected $allowedFields = ['id_detail_transaksi', 'id_produk', 'id_transaksi'];
    public function getDetailTransaksi()
    {
        return $this->findAll();
    }
    public function getTransaksiById($id)
    {
        return $this->where('id_detail_transaksi', $id)->first();
    }
}