<?php

namespace Config;

$routes = Services::routes();
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
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

// Users : Login, Register, Logout 
$routes->get('login', 'AuthController::login', ['as' => 'login']);
$routes->get('register', 'AuthController::register', ['as' => 'register']);
$routes->post('create', 'AuthController::create', ['as' => 'create']);
$routes->post('check', 'AuthController::check', ['as' => 'check']);   

$routes->get('logout', 'AuthController::logout', ['as' => 'logout']);
$routes->get('home', 'UserController::index', ['as' => 'home']);

// Admin
$routes->get('admin', 'AdminController::index', ['as' => 'admin']);
$routes->get('admin/users', 'AdminController::users', ['as' => 'users']);
$routes->get('admin/users/edit/(:num)', 'AdminController::edit/$1', ['as' => 'edit']);
$routes->post('admin/users/update', 'AdminController::update', ['as' => 'update']);
$routes->get('admin/users/delete/(:num)', 'AdminController::delete/$1', ['as' => 'delete']);

 

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

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}