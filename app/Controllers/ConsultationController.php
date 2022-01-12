<?php

namespace App\Controllers;

use App\Models\NouveauModel;

class ConsultationController extends BaseController
{

    public function __construct() {
        $this->NouveauModel = new \App\Models\NouveauModel();
        helper('securedata');

    }


    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Consultation",
            "CONTENT_PAGE" =>  "consultation",

        );
        $data['nouveau'] = $this->NouveauModel->getCompteRendu();
      //  echo '<pre>',print_r($data),'</pre>';
        echo view('dashboard', $data);
    }



}