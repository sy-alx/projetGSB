<?php

namespace App\Controllers;

class SaisirController extends BaseController
{
    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Saisir mes rendez-vous",
            "CONTENT_PAGE" =>  "saisir",
        );

        echo view('dashboard', $data);
    }

}