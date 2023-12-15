<?php
namespace App\Models;
use CodeIgniter\Model;
class Produk extends Model{
    protected $table = 'detail_produk';
    public function getProduk(){
        return $this->findAll();
    }

    public function setBatasBawah(){}

    public function setKuantitasProduk(){}

    public function saveChanges($id, $batasBawah, $kuantitasRestock)
    {
        // Update data in the database
        $data = [
            'batas_bawah' => $batasBawah,
            'kuantitas_restock' => $kuantitasRestock,
        ];

        $this->update($id, $data);
    }
}
