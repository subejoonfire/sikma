<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/kas', 'Home::kas');
$routes->get('/login', 'Login::index');
$routes->post('/loginAction', 'Login::CekLogin');
$routes->group('admin', function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->group('uang-kas-masjid', function ($routes) {
        $routes->get('/', 'UangKasMasjidController::index');
        $routes->get('rekap', 'UangKasMasjidController::rekap');
        $routes->post('store', 'UangKasMasjidController::store');
        $routes->get('edit/(:num)', 'UangKasMasjidController::edit/$1');
        $routes->post('update/(:num)', 'UangKasMasjidController::update/$1');
        $routes->get('delete/(:num)', 'UangKasMasjidController::delete/$1');
    });
    $routes->group('uang-kas-sosial', function ($routes) {
        $routes->get('/', 'UangKasSosialController::index');
        $routes->get('rekap', 'UangKasSosialController::rekap');
        $routes->post('store', 'UangKasSosialController::store');
        $routes->get('edit/(:num)', 'UangKasSosialController::edit/$1');
        $routes->post('update/(:num)', 'UangKasSosialController::update/$1');
        $routes->get('delete/(:num)', 'UangKasSosialController::delete/$1');
    });
    $routes->group('laporan-kas', function ($routes) {
        $routes->post('printMasjid', 'LaporanKasController::printMasjid');
        $routes->post('printSosial', 'LaporanKasController::printSosial');
        $routes->get('masjid', 'LaporanKasController::masjid');
        $routes->get('sosial', 'LaporanKasController::sosial');
    });
});
