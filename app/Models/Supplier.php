<?php

namespace App\Models;

use CodeIgniter\Model;

class Supplier extends Model
{
    protected $table = 'supply';
    protected $primaryKey = 'id_supply';

    public function getOrders()
    {
        return $this->findAll();
    }

    public function getSupplyDetails()
    {
        $sql = "SELECT s.id_supply, dc.nama_cabang, dc.alamat, dp.nama, dp.harga, dp.stock, dp.batas_bawah, dp.kuantitas_restock, s.status_pembayaran, s.status_pengiriman
        FROM supply s
        LEFT JOIN produk_supply ps ON ps.id_supply = s.id_supply
        LEFT JOIN detail_produk dp ON dp.id_produk = ps.id_produk
        LEFT JOIN data_cabang dc ON dc.id_cabang = ps.id_cabang";
        $query = $this->db->query($sql);
        $result = $query->getResultArray();

        return $result;
    }

    public function getTotalPrice()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT s.id_supply, SUM(dp.harga * dp.kuantitas_restock) AS total_price
        FROM supply s
        JOIN produk_supply ps ON ps.id_supply = s.id_supply
        JOIN detail_produk dp ON ps.id_produk = dp.id_produk
        GROUP BY s.id_supply";

        $query = $db->query($sql);
        $result = $query->getResultArray();

        return $result;

    }
}
