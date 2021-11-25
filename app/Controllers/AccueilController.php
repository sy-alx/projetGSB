<?php

namespace App\Controllers;

class AccueilController extends BaseController
{
    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Accueil",
            "CONTENT_PAGE" =>  "accueil",
        );

        echo view('accueil', $data);
    }


    public function LoginController()
    {
        return view('login');

    }
}
