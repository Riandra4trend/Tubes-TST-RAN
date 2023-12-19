<?php

namespace App\Models;

use CodeIgniter\Model;

class HistorySupplyModel extends Model
{
    protected $table = 'supply';
    protected $primaryKey = 'id_supply';

    public function getOrders()
    {
        return $this->findAll();
    }

    public function getSupplyDetails($id_supply)
{
    $sql = "SELECT s.id_kurir, dp.nama, dp.harga, dp.stock, dp.batas_bawah, dp.kuantitas_restock, s.status_pembayaran, s.status_pengiriman
        FROM supply s
        LEFT JOIN detail_produk dp ON dp.id_produk = s.id_produk
        LEFT JOIN produk_supply ps ON ps.id_supply = s.id_supply
        WHERE s.id_supply = $id_supply";

        $query = $this->db->query($sql);
        $result = $query->getResultArray();

        return $result;
}

    public function getTotalPrice($id_supply)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT SUM(dp.harga * dp.kuantitas_restock) AS total_price
        FROM detail_produk dp
        LEFT JOIN produk_supply ps ON ps.id_produk = dp.id_produk
        LEFT JOIN supply s ON s.id_supply = ps.id_supply
        WHERE s.id_supply = $id_supply";

        $query = $db->query($sql);
        $result = $query->getRow()->total_price;

        return $result;

    }
}
