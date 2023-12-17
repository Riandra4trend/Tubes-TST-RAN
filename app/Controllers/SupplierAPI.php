<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Auth;
use App\Models\Supplier;

class ProdukSupplyAPI extends ResourceController{
    public function index($seg1 = null){
        $numUser = $seg1;
        //ini GATAU BENER ATAU SALAH
        if ($numUser !== session()->get('num_user')) {
            return("Wrong Authentication!");
        } else {

            $orderModel = model(Supplier::class);
            $data['order'] = $orderModel->getOrders();
            $orders = [];
            foreach ($data['orders'] as &$order) {
                $id_supply = $order['id_supply'];
                $order['order_details'] = $orderModel->getOrderDetails($id_supply);
                $order['total_price'] = $orderModel->getTotalPrice($id_supply);
                array_push($orders, $order);
            }
            $data['orders'] = $orders;
                $data = ['message'  => 'success',
                        'orders' => $data['orders']];
                return $this->respond($data,200);
            }
    }
}
