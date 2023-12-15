<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->post('/login_action', 'LoginController::login_action');
$routes->get('pages/login', 'Pages::login');
$routes->get('pages/dashboard', 'Pages::dashboard');
