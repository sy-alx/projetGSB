<?php

namespace App\Controllers;

use App\Models\CompteRenduModel;

class ConsultationController extends BaseController
{

    public function __construct() {
        $this->NouveauModel = new \App\Models\CompteRenduModel();
        helper('securedata');

    }


    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Consultation",
            "CONTENT_PAGE" =>  "consultation",

        );
        $data['listePraticien'] = $this->NouveauModel->insertPraticienToConsultation();
        $data['listeRemplacant'] = $this->NouveauModel->insertRemplacantToConsultation();
        $data['listeMotifVisite'] = $this->NouveauModel->insertMotifToConsultation();


        $data['compteRendu'] = $this->NouveauModel->getCompteRendu();
      //  echo '<pre>',print_r($data),'</pre>';
        echo view('dashboard', $data);
    }

    



}