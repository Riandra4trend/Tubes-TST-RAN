<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Auth;
use App\Models\Supply;

class SupplyAPI extends ResourceController{
    public function index($seg1 = null, $seg2 = null){
        $model = model(Auth::class);
        $email = $seg1;
        $password = md5($seg2);
        $cek = $model->getDataAuthentication($email, $password);
        if ($cek == 0) {
            return("Wrong Authentication!");
        } else {
            $model1 = model(Supply::class);
            $data = ['message'  => 'success',
                     'supply' => $model1->getSupply()];
            return $this->respond($data,200);
        }
    }
}
