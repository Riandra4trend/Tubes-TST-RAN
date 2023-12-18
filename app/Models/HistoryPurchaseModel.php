<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryPurchaseModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    public function getOrders()
    {
        return $this->findAll();
    }

    public function getPurchaseDetails($id_transaksi)
    {
        $sql = "SELECT
                    t.id_transaksi,
                    t.id_karyawan,
                    dt.kuantitas,
                    dp.nama,
                    dp.harga
                FROM
                    detail_transaksi dt
                JOIN detail_produk dp ON dt.id_produk = dp.id_produk
                JOIN transaksi t ON dt.id_transaksi = t.id_transaksi
                WHERE t.id_transaksi = $id_transaksi";

        $query = $this->db->query($sql);
        $result = $query->getResultArray();

        return $result;
    }

    public function getTotalPrice($id_transaksi)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT SUM(dp.harga * dt.kuantitas) AS total_price
            FROM transaksi t
            LEFT JOIN detail_transaksi dt ON dt.id_transaksi = t.id_transaksi
            LEFT JOIN detail_produk dp ON dp.id_produk = dt.id_produk
            WHERE t.id_transaksi = $id_transaksi";

        $query = $db->query($sql);
        $result = $query->getRow()->total_price;

        return $result;
    }

    public function getPurchaseNameAndQuantity($id_transaksi)
    {
        $sql = "SELECT
                    dp.nama,
                    dt.kuantitas
                FROM
                    detail_transaksi dt
                JOIN detail_produk dp ON dt.id_produk = dp.id_produk
                WHERE dt.id_transaksi = $id_transaksi";

        $query = $this->db->query($sql);
        $result = $query->getResultArray();

        return $result;
    }
}
