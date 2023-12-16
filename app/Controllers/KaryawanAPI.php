<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Karyawan;

class KaryawanAPI extends ResourceController{
    public function index(){
        
            $model1 = model(Karyawan::class);
            $data = ['message'  => 'success',
                     'data_karyawan' => $model1->getKaryawan()];
            return $this->respond($data,200);
        }
    
}
