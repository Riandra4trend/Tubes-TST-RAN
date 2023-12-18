<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IdTransaksi extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('transaksi', [
            'id_transaksi' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('transaksi', 'id_transaksi');
    }
}
