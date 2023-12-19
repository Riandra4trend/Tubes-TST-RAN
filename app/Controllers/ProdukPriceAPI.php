<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Auth;
use App\Models\Supplier;

class ProdukPriceAPI extends ResourceController{
    public function index(){
        // $model = model(Auth::class);
        // $email = $seg1;
        // $password = md5($seg2);
        // $cek = $model->getDataAuthentication($email, $password);
        // if ($cek == 0) {
        //     return("Wrong Authentication!");
        // } else {
            $model1 = model(Supplier::class);
            $data = ['message'  => 'success',
                     'totalPrice' => $model1->getTotalPrice()];
            return $this->respond($data,200);
        // }
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
