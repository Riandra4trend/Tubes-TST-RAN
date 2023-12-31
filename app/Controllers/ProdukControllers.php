<?php
namespace App\Controllers;

use App\Models\Produk;

class ProdukControllers extends BaseController
{
    public function index()
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }

        $model = model(Produk::class);
        $data['Produk'] = $model->getProduk();
        return view('layout/header', $data) . 
            view('restock') . view('footer');
    }

    public function update($id)
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }

        $model = model(Produk::class);
        // $data['Produk'] = $model->getProduk();

        $data['selectedProduk'] = $model->getProdukById($id);

        return view('header') . 
            view('edit', $data) . view('footer');
    }
}
