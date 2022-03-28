<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;


class SigninController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('signin');
    }

    public function loginAuth()
    {
        $session = session();

        $userModel = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);
                return redirect()->to('/profil');

            }else{
                $session->setFlashdata('msg', 'Le mot de passe est erroné.');
                return redirect()->to('/signin');
            }

        }else{
            $session->setFlashdata('msg', "Email n'existe pas.");
            return redirect()->to('/signin');
        }
    }

    // ionic --> check siginIn
    public function signInApi($email, $password) {
        $userModel = new UserModel();

        $data = $userModel->where('email', $email)->first();

        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];

                return $ses_data;
            }
        }
    }
}