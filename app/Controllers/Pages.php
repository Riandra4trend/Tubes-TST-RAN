<?php

namespace App\Controllers;

use App\Models\HistoryPurchaseModel;
use App\Models\HistorySupplyModel;
use App\Models\Produk;
use App\Models\Supplier;
use App\Models\ProdukSupply;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\User;

class Pages extends BaseController
{
    protected $Produk;
    protected $Transaksi;
    protected $DetailTransaksi;
    protected $Supplier;
    protected $ProdukSupply;
    public function __construct()
    {
        $this->Produk = new Produk(); // Instantiate the model
        $this->Transaksi = model(Transaksi::class);
        $this->DetailTransaksi = model(DetailTransaksi::class);
        $this->Supplier = model(Supplier::class);
        $this->ProdukSupply = model(ProdukSupply::class);
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

    public function purchase()
    {
        $selectedProducts = $this->request->getPost('selected_products');
        $selectedProductsArray = json_decode($selectedProducts[0], true);
        $paymentMethod = $this->request->getPost('payment_method');
        $totalHarga = $this->request->getPost('total_harga');

        $this->Transaksi->save([
            'id_karyawan' => 1,
            'total_harga' => $totalHarga,
            'metode_pembayaran' => $paymentMethod
        ]);

        $transaksiId = $this->Transaksi->insertID();
        $indexes = array_keys($selectedProductsArray);

        foreach ($selectedProductsArray as $productIndex => $quantity) {
            $selectedIndex = (int) $productIndex;
            // dd($quantity);
            // Check if quantity is greater than zero before saving in DetailTransaksi
            if ($quantity > 0) {
                $this->DetailTransaksi->save([
                    'id_transaksi' => $transaksiId,
                    'id_produk' => $selectedIndex + 1,
                    'kuantitas' => $quantity
                ]);
            }
            $produkModel = new Produk();
            $produk = $produkModel->find($selectedIndex + 1);

            if ($produk) {
                $newStock = $produk['stock'] - $quantity;
                $produkModel->update($selectedIndex + 1, ['stock' => $newStock]);

                if ($newStock <= $produk['batas_bawah']) {
                    // Add the product to the $needToRestock array
                    $needToRestock[] = $produk;
                }
            }
        }
        // dd($needToRestock);

        $this->Supplier->save([
            'id_kurir' => 1,
            'status_pengiriman'=> 'On Progress',
            'status_pembayaran' => 'Pending'
        ]);
        $supplyId = $this->Supplier->insertID();
        foreach ($needToRestock as $restock){
            $this->ProdukSupply->save([
                'id_produk'=> $restock['id_produk'],
                'id_supply'=> $supplyId,
                'id_cabang' => 1
            ]);
        }

        return redirect()->to('pages/dashboard');
    }


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
    }

    public function historyRestock()
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

    // Pages.php controller
    public function historyPurchase()
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        $transaksiModel = model(Transaksi::class);

        // Mendapatkan semua transaksi dengan detail
        $data['transactions'] = $transaksiModel->getTransaksiWithDetails();
        
        return view("layout/header", $data) . view('layout/sidebar') . view('pages/historyPurchase') . view('layout/footer');
    }


}