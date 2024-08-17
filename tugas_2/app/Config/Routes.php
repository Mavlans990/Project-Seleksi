<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home');

$routes->get('/lokasi', 'LokasiController::index');
$routes->get('/lokasi/create', 'LokasiController::create');
$routes->post('/lokasi/store', 'LokasiController::store');
$routes->get('/lokasi/edit/(:num)', 'LokasiController::edit/$1');
$routes->post('/lokasi/update/(:num)', 'LokasiController::update/$1');
$routes->get('/lokasi/delete/(:num)', 'LokasiController::delete/$1');

$routes->get('/proyek', 'ProyekController::index');
$routes->get('/proyek/create', 'ProyekController::create');
$routes->post('/proyek/store', 'ProyekController::store');
$routes->get('/proyek/edit/(:num)', 'ProyekController::edit/$1');
$routes->post('/proyek/update/(:num)', 'ProyekController::update/$1');
$routes->get('/proyek/delete/(:num)', 'ProyekController::delete/$1');

$routes->group('api', function($routes) {
    $routes->get('lokasi', 'Api\LokasiController::index');
    $routes->get('lokasi/(:num)', 'Api\LokasiController::show/$1');
    $routes->post('lokasi', 'Api\LokasiController::create');
    $routes->put('lokasi/(:num)', 'Api\LokasiController::update/$1');
    $routes->delete('lokasi/(:num)', 'Api\LokasiController::delete/$1');

    $routes->get('proyek', 'Api\ProyekController::index');
    $routes->get('proyek/(:num)', 'Api\ProyekController::show/$1');
    $routes->post('proyek', 'Api\ProyekController::create');
    $routes->put('proyek/(:num)', 'Api\ProyekController::update/$1');
    $routes->delete('proyek/(:num)', 'Api\ProyekController::delete/$1');
});
