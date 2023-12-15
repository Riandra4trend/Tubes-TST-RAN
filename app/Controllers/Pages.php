<?php

namespace App\Controllers;

class Pages extends BaseController
{

    public function index(): string
    {
        return view('layout/header').view('pages/landingPage').view('layout/footer');
    }

    public function login(): string
    {
        return view('pages/login');
    }
    public function register(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view('layout/sidebar').view('pages/register').view('layout/footer');
    }

    public function dashboard(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view('layout/sidebar').view('pages/dashboard').view('layout/footer');
    }

    public function restock(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view('layout/sidebar').view('pages/restock').view('layout/footer');
    }

    public function historyRestock(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view('layout/sidebar').view('pages/historyRestock').view('layout/footer');
    }

    public function historyPurchase(): string
    {
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
        }
        return view('layout/sidebar').view('pages/historyPurchase').view('layout/footer');
    }


}
