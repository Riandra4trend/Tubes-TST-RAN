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
        return view('header', $data) . view('menu') .
            view('foodmart') . view('footer');


    }

    public function toggleEditMode($id)
    {
        // Toggling edit mode in the session
        $session = session();
        $produk = $session->get('produk');

        if (isset($produk[$id]['edit_mode'])) {
            $produk[$id]['edit_mode'] = !$produk[$id]['edit_mode'];
        } else {
            $produk[$id]['edit_mode'] = true;
        }

        $session->set('produk', $produk);

        return json_encode(['success' => true]);
    }

    public function saveChanges($id, $batasBawah, $kuantitasRestock)
    {
        // Save changes to the database
        $model = model(Produk::class);
        $model->saveChanges($id, $batasBawah, $kuantitasRestock);

        // Turn off edit mode in the session
        $session = session();
        $produk = $session->get('produk');

        if (isset($produk[$id]['edit_mode'])) {
            $produk[$id]['edit_mode'] = false;
        }

        $session->set('produk', $produk);

        return redirect()->to('/produk/index');
    }
}
