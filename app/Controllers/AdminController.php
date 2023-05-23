<?php

namespace App\Controllers;
use App\Models\UserModel;
 

class AdminController extends BaseController
{
  /* 
// Admin
    $routes->get('admin', 'AdminController::index', ['as' => 'admin']);
    $routes->get('admin/users', 'AdminController::users', ['as' => 'users']);
    $routes->get('admin/users/edit/(:num)', 'AdminController::edit/$1', ['as' => 'edit']);
    $routes->post('admin/users/update', 'AdminController::update', ['as' => 'update']);
    $routes->get('admin/users/delete/(:num)', 'AdminController::delete/$1', ['as' => 'delete']);
  */
	public function index()
	{
    /* userInfo */
    $data = [
      'pageTitle'=>'Dashboard | Home',
      'userInfo'=> session()->get('LoggedUser')
    ];

    /* cabecera */
    $data['cabecera'] = view('template/cabecera', $data);
    

    return view('admin/index', $data); // vista(Views): admin/index.php
  }

  public function users() {
    $userModel = new UserModel();
    $users = $userModel->findAll();
    $data = [
      'pageTitle'=>'Dashboard | Users',
      'userInfo'=> session()->get('LoggedUser'),
      'users' => $users
    ];
    $data['cabecera'] = view('template/cabecera', $data);

    return view('admin/users', $data); // vista(Views): admin/users.php
  }

  public function edit($id) {
    $userModel = new UserModel();
    $user = $userModel->find($id);
    $data = [
      'pageTitle'=>'Dashboard | Edit User',
      'userInfo'=> session()->get('LoggedUser'),
      'user' => $user
    ];
    return view('admin/edit', $data); // vista(Views): admin/edit.php
  }

  public function update() {
    $userModel = new UserModel();
    $id = $this->request->getVar('id');
    $data = [
      'name' => $this->request->getVar('name'),
      'email' => $this->request->getVar('email'),
      'password' => $this->request->getVar('password')
    ];
    $userModel->update($id, $data);
    return $this->response->redirect(site_url('/admin/users'));
  }

  /*delete
$routes->get('admin/users/delete/(:num)', 'AdminController::delete/$1', ['as' => 'delete']);
  */
  public function delete($id) {
    $userModel = new UserModel();
    $userModel->delete($id);
    return $this->response->redirect(site_url('/admin/users'));
  }


}
