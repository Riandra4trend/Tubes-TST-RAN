<?php

namespace App\Controllers;

use App\Models\HistoryPurchaseModel;
use App\Models\HistorySupplyModel;
use App\Models\Produk;
use App\Models\ProdukSupply;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Su;

use App\Models\User;

class Pages extends BaseController
{
    protected $Produk;
    public function __construct()
    {
        $this->Produk = new Produk(); // Instantiate the model
    }

    public function index(): string
    {
        return view('layout/header') . view('pages/landingPage') . view('layout/footer');
    }

    public function login(): string
    {
        return view('layout/header') . view('pages/login') . view('layout/footer');
    }

    public function register(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view('layout/sidebar') . view('pages/register') . view('layout/footer');
    }

    public function dashboard()
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('pages/login');
        }

        $model = model(Produk::class);
        $data['produk'] = $model->getProduk();
        return view('layout/header', $data) . view('layout/sidebar') . view('pages/dashboard') . view('layout/footer');
    }

    // metode ini digunakan untuk mengupdate data terkait yang didapat dari pages/dashboard.php
    

    public function restock(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }

        $model = model(Produk::class);
        $data['produk'] = $model->getProduk();
        return view("layout/header", $data) . view('layout/sidebar') . view('pages/restock') . view('layout/footer');
    }

    public function edit($id): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        $selectedProduk = $this->Produk->getProdukById($id);
        return view("layout/header") . view('layout/sidebar') . view('pages/edit', ['selectedProduk' => $selectedProduk]);
    }

    public function update($id)
    {
        $this->Produk->save([
            'id_produk' => $id,
            'batas_bawah' => $this->request->getVar('batas_bawah'),
            'kuantitas_restock' => $this->request->getVar('kuantitas_restock'),
        ]);
        return redirect()->to('pages/restock');
        // dd($this->request->getVar());
    }

    public function historyRestock(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        $orderModel = model(HistorySupplyModel::class);

        // Mendapatkan semua pesanan
        $data['orders'] = $orderModel->getOrders();
        // Mendapatkan detail pesanan berdasarkan id_supply (ganti dengan id_supply yang sesuai)

        $orders = [];
        foreach ($data['orders'] as &$order) {
            $id_supply = $order['id_supply'];
            $order['order_details'] = $orderModel->getSupplyDetails($id_supply);
            $order['total_price'] = $orderModel->getTotalPrice($id_supply);
            array_push($orders, $order);
        }

        $data['orders'] = $orders;
        return view("layout/header", $data) . view('layout/sidebar') . view('pages/historyRestock') . view('layout/footer');
    }

    public function historyPurchase(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        $orderModel = model(HistoryPurchaseModel::class);

        // Mendapatkan semua pesanan
        $data['orders'] = $orderModel->getOrders();
        // Mendapatkan detail pesanan berdasarkan id_supply (ganti dengan id_supply yang sesuai)

        $orders = [];
        foreach ($data['orders'] as &$order) {
            $id_transaksi = $order['id_transaksi'];
            $order['order_details'] = $orderModel->getPurchaseDetails($id_transaksi);
            $order['total_price'] = $orderModel->getTotalPrice($id_transaksi);
            array_push($orders, $order);
        }

        $data['orders'] = $orders;
        return view("layout/header", $data) . view('layout/sidebar') . view('pages/historyPurchase') . view('layout/footer');
    }


}
