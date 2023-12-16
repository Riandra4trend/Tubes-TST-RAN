<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\Auth;
use App\Models\Supplier;

class ProdukSupplyAPI extends ResourceController{
    public function index($seg1 = null, $seg2 = null, $seg3 = null){
        $model = model(Auth::class);
        $email = $seg1;
        $password = md5($seg2);
        $role = $seg3;
        $cek = $model->getDataAuthentication($email, $password);
        if ($cek == 0 && $role != 'supplier') {
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
