<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->post('/login_action', 'LoginController::login_action');
$routes->get('pages/login', 'Pages::login');
$routes->get('pages/dashboard', 'Pages::dashboard');
$routes->post('/purchase', 'Pages::purchase');
$routes->get('pages/restock', 'Pages::restock');
$routes->get('pages/edit/(:num)', 'Pages::edit/$1');
$routes->post('pages/update/(:num)', 'Pages::update/$1');
$routes->get('pages/historyRestock', 'Pages::historyRestock');
$routes->get('pages/historyPurchase', 'Pages::historyPurchase');
$routes->get('pages/logout', 'LoginController::logout');
$routes->get('cabangAPI/(:any)/(:any)', 'CabangAPI::index/$1/$2');
$routes->get('produkAPI/(:any)/(:any)', 'ProdukAPI::index/$1/$2');
$routes->get('detailtransaksiAPI/(:any)/(:any)', 'DetailTransaksiAPI::index/$1/$2');
$routes->get('transaksiAPI/(:any)/(:any)', 'TransaksiAPI::index/$1/$2');

$routes->get('kurirAPI/(:any)/(:any)', 'KurirAPI::index/$1/$2');
$routes->get('produkSupplierAPI/(:any)/(:any)', 'ProdukSupplierAPI::index/$1/$2');
$routes->get('produkCabangAPI/(:any)/(:any)', 'ProdukCabangAPI::index/$1/$2');

//ini API yang dipakai supplier
$routes->get('karyawanAPI', 'KaryawanAPI::index');

//API yang di protek
$routes->get('supplyAPI/(:any)', 'SupplyAPI::index/$1');
$routes->get('supplierAPI/(:any)', 'SupplierAPI::index/$1');
$routes->get('produkPriceAPI/(:any)', 'ProdukPriceAPI::index/$1');

$routes->post('supplyAPI/edit/(:any)/(:any)', 'SupplyAPI::edit/$1/$2');
