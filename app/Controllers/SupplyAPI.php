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
    public function edit($id_supply = null, $status_pengiriman = null){
        $model = new Supply();
        $data = [
            'id_supply' => $id_supply,
            'status_pengiriman' => $status_pengiriman
        ];
        $model->update($id_supply, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }
}
