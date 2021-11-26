<?php

namespace App\Controllers;

class VoirrdvController extends BaseController
{
    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Voir mes rdv",
            "CONTENT_PAGE" =>  "voirrdv",
        );

        echo view('dashboard', $data);
    }

}