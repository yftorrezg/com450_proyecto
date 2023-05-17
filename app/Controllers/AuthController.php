<?php

namespace App\Controllers;
use App\Models\UserModel; #user model 
use App\Libraries\Hash; #contraseña user

class AuthController extends BaseController
{
    protected $helpers = ['url', 'form']; 

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function create(){

        $validation = $this->validate([
            'name' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tu nombre es requerido.',
                ],
            ],
            'email' => [
                'rules'  => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Tu Email es requerido.',
                    'valid_email' => 'Por favor ingresa un email valido.',
                    'is_unique' => 'El email ya esta registrado.',
                ],
            ],
            'password' => [
                'rules'  => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'Contraseña es requerida.',
                    'min_length' => 'Contraseña debe tener al menos 5 caracteres.',
                    'max_length' => 'Contraseña no debe tener mas de 20 caracteres.',
                ],
            ],
            'cpassword' => [
                'rules'  => 'matches[password]',
                'errors' => [
                    'required' => 'Confirmar contraseña es requerida.',
                    'min_length' => 'Confirmar contraseña debe tener al menos 5 caracteres.',
                    'max_length' => 'Confirmar contraseña no debe tener mas de 20 caracteres. ',
                    'matches' => 'Las contraseñas no coinciden.',
                ],
            ],
        ]);

        if(!$validation){
          /* 
           <?= csrf_field(); ?>
               <?php if( !empty( session()->getFlashdata('fail') ) ) : ?>
                   <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
               <?php endif ?>

               <?php if( !empty( session()->getFlashdata('success') ) ) : ?>
                   <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
               <?php endif ?>

           */
          /* fail */
            $data = [
                'validation' => $this->validator,
            ];

            session()->setFlashdata('fail', 'Revise la informacion por favor.');
            return view('auth/register', $data);
            
        }else{
            //Register user in database
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
               'name'=>$name,
               'email'=>$email,
               'password'=>Hash::make($password),
            ];

         
            $userModel = new UserModel();
            $query = $userModel->insert($values);
            if( !$query ){
                 return  redirect()->to('register')->with('fail', 'Revise la informacion por favor.');
            }else{
                  return  redirect()->to('register')->with('success', 'Felicidades. Ahora puede iniciar sesion.');
            }
        }
    }


    public function check(){

        $validation = $this->validate([
            'email' => [
                'rules'  => 'required|valid_email|is_not_unique[users.email]',
                'errors' => [
                    'required' => 'Email es requerido.',
                    'valid_email' => 'Por favor ingresa un email valido.',
                    'is_not_unique' => 'Email no esta registrado.',
                ],
            ],
            'password' => [
                'rules'  => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'Contraseña es requerida.',
                    'min_length' => 'Contraseña debe tener al menos 5 caracteres.',
                    'max_length' => 'Contraseña no debe tener mas de 20 caracteres.',
                ],
            ],
        ]);

        if(!$validation){
            /* fail */
            session()->setFlashdata('fail', 'Revise la informacion por favor.');
            $data = [
                'validation' => $this->validator,
            ];
            return view('auth/login', $data);            
        }else{
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $userModel = new UserModel();
            $user_info = $userModel->where('email', $email)->first();
       
            $check_password = Hash::check($password, $user_info['password']);
            if( !$check_password ){
                 
                return  redirect()->to('login')->with('Error', 'Contraseña incorrecta')->withInput();
            }else{
                $session_data = ['user' => $user_info];
                session()->set('LoggedUser', $session_data);
                return  redirect()->to('home');

            }
        }
    }

    public function logout(){
        if(session()->has('LoggedUser')){
            session()->remove('LoggedUser');
            return redirect()->to('login');
        }

        if(session()->has('AdminLogged')){
            session()->remove('AdminLogged');
            return redirect()->to('login');
        }
    }
}