<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Auth;
use App\Models\Supply;

class SupplyAPI extends ResourceController{
    public function index(){
        
            $model1 = model(Supply::class);
            $data = ['message'  => 'success',
                     'supply' => $model1->getSupply()];
            return $this->respond($data,200);
        
    }
    
}
