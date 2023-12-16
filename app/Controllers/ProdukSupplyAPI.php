<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Auth;
use App\Models\ProdukSupply;

class ProdukSupplyAPI extends ResourceController{
    public function index($seg1 = null, $seg2 = null){
        $model = model(Auth::class);
        $email = $seg1;
        $password = md5($seg2);
        $cek = $model->getDataAuthentication($email, $password);
        if ($cek == 0) {
            return("Wrong Authentication!");
        } else {
            $model1 = model(ProdukSupply::class);
            $data = ['message'  => 'success',
                     'produk_supply' => $model1->getProdukSupply()];
            return $this->respond($data,200);
        }
    }
}
