<?php
namespace App\Models;

use CodeIgniter\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_transaksi', 'id_karyawan', 'total_harga', 'metode_pembayaran'];
    public function getTransaksi()
    {
        return $this->findAll();
    }
    public function getTransaksiById($id)
    {
        return $this->where('id_transaksi', $id)->first();
    }
}