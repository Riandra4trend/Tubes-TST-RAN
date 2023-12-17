<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Auth;
use App\Models\DetailTransaksi;

class DetailTransaksiAPI extends ResourceController{
    public function index($seg1 = null, $seg2 = null){
        $model = model(Auth::class);
        $email = $seg1;
        $password = md5($seg2);
        $cek = $model->getDataAuthentication($email, $password);
        if ($cek == 0) {
            return("Wrong Authentication!");
        } else {
            $model1 = model(DetailTransaksi::class);
            $data = ['message'  => 'success',
                     'detail_transaksi' => $model1->getDetailTransaksi()];
            return $this->respond($data,200);
        }
    }
}
