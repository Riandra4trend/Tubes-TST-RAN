<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Auth;
use App\Models\Supplier;

class SupplierAPI extends ResourceController{
    public function index($seg1=null){
        $numUser = $seg1;
        if ($numUser == '') {
            return("Wrong Authentication!");
        }
        else{   
            $model = model(Supplier::class);
            $data = ['message'  => 'success',
                     'supplier' => $model->getSupplyDetails()];
            return $this->respond($data,200);
        
    }
}
    // public function index(){
       
    //     //ini GATAU BENER ATAU SALAH
        

    //         $orderModel = model(Supplier::class);
    //         $data['order'] = $orderModel->getOrders();
    //         $orders = [];
    //         foreach ($data['orders'] as &$order) {
    //             $id_supply = $order['id_supply'];
    //             $order['order_details'] = $orderModel->getOrderDetails($id_supply);
    //             $order['total_price'] = $orderModel->getTotalPrice($id_supply);
    //             array_push($orders, $order);
    //         }
    //         $data['orders'] = $orders;
    //             $data = ['message'  => 'success',
    //                     'orders' => $data['orders']];
    //             return $this->respond($data,200);
            
    // }
}
