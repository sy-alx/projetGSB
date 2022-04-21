<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class SigninController extends Controller
{

    use ResponseTrait;

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
                    'role'=> $data['fk_role'],
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
    public function signInApi() {
        $userModel = new UserModel();
        $session = session();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();
        $ses_data = array();
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE,
                    'token' => $session->session_id
                ];
                $session->set($ses_data);
            }
        }

        if(!empty($ses_data)) {
            return $this->respond($ses_data);
        }
        else {
            return $this->fail('notAllowed', 403);
        }
    
    }
}