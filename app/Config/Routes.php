<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('login');
$routes->get('/', 'Auth::login');

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');

    // Anggota
    $routes->get('anggota', 'DataAnggota::index');
    $routes->add('anggota/create', 'DataAnggota::create');
    $routes->add('anggota/edit/(:num)', 'DataAnggota::edit/$1');
    $routes->get('anggota/delete/(:num)', 'DataAnggota::delete/$1');

    // Riwayat
    $routes->get('riwayat/berhasil', 'Riwayat::berhasil');
    $routes->get('riwayat/gagal', 'Riwayat::gagal');
    $routes->get('riwayat/berhasil/delete/(:num)', 'Riwayat::deleteBerhasil/$1');
    $routes->get('riwayat/gagal/delete/(:num)', 'Riwayat::deleteGagal/$1');
});

$routes->post('login', 'Auth::attempt');
$routes->get('logout', 'Auth::logout');

//API
$routes->post('/api/iot/receive', 'IotReceiver::receive');
