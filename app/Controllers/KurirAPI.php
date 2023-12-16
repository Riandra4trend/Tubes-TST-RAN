<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Auth;
use App\Models\Kurir;

class KurirAPI extends ResourceController{
    public function index($seg1 = null, $seg2 = null){
        $model = model(Auth::class);
        $email = $seg1;
        $password = md5($seg2);
        $cek = $model->getDataAuthentication($email, $password);
        if ($cek == 0) {
            return("Wrong Authentication!");
        } else {
            $model1 = model(Kurir::class);
            $data = ['message'  => 'success',
                     'data_kurir' => $model1->getKurir()];
            return $this->respond($data,200);
        }
    }
}
