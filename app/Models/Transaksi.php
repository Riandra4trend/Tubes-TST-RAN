<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_transaksi', 'id_karyawan', 'total_harga', 'metode_pembayaran'];

    // Updated method to include details of associated products
    public function getTransaksiWithDetails()
    {
        $builder = $this->db->table('transaksi t');
        $builder->select('t.*, dt.id_detail_transaksi, p.nama, p.harga, p.image, dt.kuantitas');
        $builder->join('detail_transaksi dt', 't.id_transaksi = dt.id_transaksi');
        $builder->join('detail_produk p', 'dt.id_produk = p.id_produk');
        return $builder->get()->getResultArray();
    }

    // You can keep the existing getTransaksiById method if needed
    public function getTransaksiById($id)
    {
        return $this->where('id_transaksi', $id)->first();
    }
}
