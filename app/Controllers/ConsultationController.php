<?php

namespace App\Controllers;

class ConsultationController extends BaseController
{
    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Consultation",
            "CONTENT_PAGE" =>  "consultation",
        );

        echo view('dashboard', $data);
    }

}