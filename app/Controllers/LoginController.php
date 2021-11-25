<?php

namespace App\Controllers;

class LoginController extends BaseController
{
    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Connectez-vous",
            "CONTENT_PAGE" =>  "login",
        );

        echo view('login', $data);
    }

}