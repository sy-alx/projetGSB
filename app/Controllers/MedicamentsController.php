<?php

namespace App\Controllers;

class MedicamentsController extends BaseController
{
    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Info médicaments",
            "CONTENT_PAGE" =>  "medicaments",
        );

        echo view('dashboard', $data);
    }

}