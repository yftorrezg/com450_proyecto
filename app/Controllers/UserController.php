<?php

namespace App\Controllers;
use App\Models\UserModel;

class UserController extends BaseController
{
  
    public function index(){
        $data = [
           'pageTitle'=>'Dashboard | Home',
           'userInfo'=> session()->get('LoggedUser')
        ];
         return view('dashboard/home', $data);
    }

    public function logout(){
        if ( session()->get('LoggedUser')){
            session()->remove('LoggedUser');
            return redirect()->to('/auth/login');
        }
    }

    public function profile(){
        $data = [
            'pageTitle'=>'Dashboard | Profile',
            'userInfo'=> session()->get('LoggedUser')
         ];
          return view('dashboard/profile', $data);
    }

    public function updateProfile(){
        $data = [
            'pageTitle'=>'Dashboard | Update Profile',
            'userInfo'=> session()->get('LoggedUser')
         ];
          return view('dashboard/update_profile', $data);
    }

     
}