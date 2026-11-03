<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login');

// Login
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout', ['filter' => 'auth']);

// Semua halaman akademik membutuhkan login
$routes->group('', ['filter' => 'auth'], static function ($routes) {

    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('nilai', 'Nilai::index');
    $routes->get('transkrip', 'Transkrip::index');
    $routes->get('transkrip/(:num)', 'Transkrip::show/$1');

    // Data yang bisa dilihat semua pengguna
    $routes->get('mahasiswa', 'Mahasiswa::index');
    $routes->get('dosen', 'Dosen::index');
    $routes->get('mata-kuliah', 'MataKuliah::index');
    $routes->get('krs', 'KRS::index');

    // Pengelolaan data hanya untuk admin
    $routes->group('', ['filter' => 'admin'], static function ($routes) {

        $routes->get('mahasiswa/create', 'Mahasiswa::create');
        $routes->post('mahasiswa/store', 'Mahasiswa::store');
        $routes->get('mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');
        $routes->post('mahasiswa/update/(:num)', 'Mahasiswa::update/$1');
        $routes->post('mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');

        $routes->get('dosen/create', 'Dosen::create');
        $routes->post('dosen/store', 'Dosen::store');
        $routes->get('dosen/edit/(:num)', 'Dosen::edit/$1');
        $routes->post('dosen/update/(:num)', 'Dosen::update/$1');
        $routes->post('dosen/delete/(:num)', 'Dosen::delete/$1');

        $routes->get('mata-kuliah/create', 'MataKuliah::create');
        $routes->post('mata-kuliah/store', 'MataKuliah::store');
        $routes->get('mata-kuliah/edit/(:num)', 'MataKuliah::edit/$1');
        $routes->post('mata-kuliah/update/(:num)', 'MataKuliah::update/$1');
        $routes->post('mata-kuliah/delete/(:num)', 'MataKuliah::delete/$1');

        $routes->post('krs/store', 'KRS::store');
        $routes->post('krs/delete/(:num)', 'KRS::delete/$1');
        $routes->get('nilai/create', 'Nilai::create');
        $routes->post('nilai/store', 'Nilai::store');
        $routes->get('nilai/edit/(:num)', 'Nilai::edit/$1');
        $routes->post('nilai/update/(:num)', 'Nilai::update/$1');
        $routes->post('nilai/delete/(:num)', 'Nilai::delete/$1');
    });
});