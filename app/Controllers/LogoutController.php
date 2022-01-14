<?php

namespace App\Controllers;

class LogoutController extends BaseController
{
    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Déconnection",
            "CONTENT_PAGE" =>  "logout",
        );

        echo view('logout', $data);
    }

}