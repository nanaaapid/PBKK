<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Katalog publik
$routes->get('/', 'Product::index');
$routes->get('products', 'Product::index');
$routes->get('products/(:num)', 'Product::show/$1');

// Authentication
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::store');
$routes->get('logout', 'Auth::logout', ['filter' => 'auth']);

// Keranjang
$routes->get('cart', 'Cart::index');
$routes->post('cart/add', 'Cart::add');
$routes->post('cart/update', 'Cart::update');
$routes->post('cart/remove/(:num)', 'Cart::remove/$1');

// Fitur pelanggan yang membutuhkan login
$routes->group('', ['filter' => 'auth'], static function ($routes) {

    $routes->get('checkout', 'Checkout::index');
    $routes->post('checkout/place-order', 'Checkout::placeOrder');

    $routes->get('orders', 'Orders::index');
    $routes->get('orders/(:num)', 'Orders::show/$1');

});

// Fitur admin
$routes->group('admin', ['filter' => ['auth', 'admin']], static function ($routes) {

    $routes->get('/', 'AdminDashboard::index');

    // Kelola produk
    $routes->get('products', 'AdminProduct::index');
    $routes->get('products/create', 'AdminProduct::create');
    $routes->post('products/store', 'AdminProduct::store');
    $routes->get('products/edit/(:num)', 'AdminProduct::edit/$1');
    $routes->post('products/update/(:num)', 'AdminProduct::update/$1');
    $routes->post('products/delete/(:num)', 'AdminProduct::delete/$1');

    // Kelola pesanan
    $routes->get('orders', 'AdminOrder::index');
    $routes->post('orders/update/(:num)', 'AdminOrder::update/$1');
});