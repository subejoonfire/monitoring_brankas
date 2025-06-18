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
    $routes->get('anggota', 'Anggota::index');
    $routes->add('anggota/create', 'Anggota::create');
    $routes->add('anggota/edit/(:num)', 'Anggota::edit/$1');
    $routes->get('anggota/delete/(:num)', 'Anggota::delete/$1');

    // Riwayat
    $routes->get('riwayat/berhasil/rfid', 'Riwayat::berhasilRFID');
    $routes->get('riwayat/berhasil/keypad', 'Riwayat::berhasilKeypad');
    $routes->get('riwayat/gagal', 'Riwayat::gagal');
    $routes->get('riwayat/berhasil/delete/(:num)', 'Riwayat::deleteBerhasil/$1');
    $routes->get('riwayat/gagal/delete/(:num)', 'Riwayat::deleteGagal/$1');
});

$routes->post('login', 'Auth::attempt');
$routes->get('logout', 'Auth::logout');

//API
$routes->post('/api/rfid', 'IotReceiver::rfid');
$routes->post('/api/keypad', 'IotReceiver::keypad');
