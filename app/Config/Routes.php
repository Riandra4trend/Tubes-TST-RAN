<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->post('/login_action', 'LoginController::login_action');
$routes->get('pages/login', 'Pages::login');
$routes->get('pages/dashboard', 'Pages::dashboard');
$routes->get('pages/restock', 'Pages::restock');
$routes->get('pages/edit/(:num)', 'Pages::edit/$1');
$routes->post('pages/update/(:num)', 'Pages::update/$1');
$routes->get('pages/historyRestock', 'Pages::historyRestock');
$routes->get('pages/historyPurchase', 'Pages::historyPurchase');
$routes->get('pages/logout', 'LoginController::logout');