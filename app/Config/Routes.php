<?php

namespace Config;

$routes = Services::routes();

/*
 * Router Setup
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// $routes->setAutoRoute(false);

/*
 * Route Definitions
 */

$routes->get('/', 'Libros::index');

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

// Libros
$routes->get('listar', 'Libros::index');
$routes->get('crear', 'Libros::crear');
$routes->post('guardar', 'Libros::guardar');
$routes->get('borrar/(:num)', 'Libros::borrar/$1');
$routes->get('editar/(:num)', 'Libros::editar/$1');
$routes->post('actualizar', 'Libros::actualizar');

// Vender
$routes->get('vender', 'Venders::index');
$routes->post('agregar', 'Venders::agregar');
$routes->get('quitar/(:num)', 'Venders::quitar/$1');

$routes->get('terminarVenta', 'Venders::terminarVenta');
$routes->get('cancelarVenta', 'Venders::cancelarVenta');
