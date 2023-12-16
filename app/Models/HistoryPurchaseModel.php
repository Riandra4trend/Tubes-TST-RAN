<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryPurchaseModel extends Model
{
    protected $table = 'detail_produk';
    protected $primaryKey = 'id_produk';

    public function getOrders()
    {
        return $this->findAll();
    }

    public function getPurchaseDetails()
{
    $sql = "SELECT
    dt.id_transaksi,
    t.id_kasir,
    dp.nama,
    dp.harga,
    t.metode_pembayaran
FROM
    detail_transaksi dt
JOIN
    detail_produk dp ON dt.id_produk = dp.id_produk
JOIN
    transaksi t ON dt.id_transaksi = t.id_transaksi;

";

        $query = $this->db->query($sql);
        $result = $query->getResultArray();

        return $result;
}
}
