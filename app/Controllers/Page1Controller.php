<?php

namespace App\Controllers;

class Page1Controller extends BaseController
{
    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Connectez-vous",
            "CONTENT_PAGE" =>  "page1",
        );

        echo view('dashboard', $data);
    }

}