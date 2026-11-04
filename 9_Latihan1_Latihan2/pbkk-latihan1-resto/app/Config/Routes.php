<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login');

// Authentication
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout', ['filter' => 'auth']);

// Halaman yang wajib login
$routes->group('', ['filter' => 'auth'], static function ($routes) {

    $routes->get('dashboard', 'Dashboard::index');

    // Semua user bisa melihat menu
    $routes->get('menu', 'Menu::index');

    // Hanya admin bisa mengelola menu
    $routes->group('menu', ['filter' => 'admin'], static function ($routes) {
        $routes->get('create', 'Menu::create');
        $routes->post('store', 'Menu::store');
        $routes->get('edit/(:num)', 'Menu::edit/$1');
        $routes->post('update/(:num)', 'Menu::update/$1');
        $routes->post('delete/(:num)', 'Menu::delete/$1');
    });
});