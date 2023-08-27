<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/sparepart', 'Sparepart::index');
$routes->get('/sparepart/create', 'Sparepart::create');
$routes->get('/sparepart/edit/(:any)', 'Sparepart::edit/$1');
$routes->post('/sparepart/store', 'Sparepart::store');
$routes->post('/sparepart/update/(:any)', 'Sparepart::update/$1');
$routes->post('/sparepart/delete/(:any)', 'Sparepart::delete/$1');
