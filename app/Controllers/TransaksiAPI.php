<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\Auth;
use App\Models\Transaksi;

class TransaksiAPI extends ResourceController
{
    // TransaksiAPI.php controller
public function index($seg1 = null, $seg2 = null)
    {
        $model = model(Auth::class);
        $email = $seg1;
        $password = md5($seg2);
        $cek = $model->getDataAuthentication($email, $password);

        if ($cek == 0) {
            return "Wrong Authentication!";
        } else {
            $model1 = model(Transaksi::class);
            
            // Use the new method to get transactions with details
            $transactions = $model1->getTransaksiWithDetails();

            $data = [
                'message' => 'success',
                'transaksi' => $transactions
            ];

            return $this->respond($data, 200);
        }
    }
}
