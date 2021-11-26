<?php

namespace App\Controllers;

class ProfilController extends BaseController
{
    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Profil",
            "CONTENT_PAGE" =>  "profil",
        );

        echo view('dashboard', $data);
    }

}