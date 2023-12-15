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
        return view('header', $data). view('menu') .
        view('foodmart').view('footer');

        
    }
}
