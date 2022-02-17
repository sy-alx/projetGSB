<?php

namespace App\Controllers;

use App\Models\VoirrdvModel;

class VoirrdvController extends BaseController
{
    protected $db;
    protected $nouveauModel;

    public function __construct() {
        helper(['form', 'url']);
        $this->db = \Config\Database::connect();
        // load model //
        $this->nouveauModel = new \App\Models\VoirrdvModel();
        $this->model = new VoirrdvModel();

    }
    
    // public function createCalendar(){
        
    // }

    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Voir mes rdv",
            "CONTENT_PAGE" =>  "voirrdv",
        );
        $data['jour'] = $this->nouveauModel->getDateOfFirstDayOfTheWeekToDisplay($this->request->getVar('semaine'), $this->request->getVar('jour'));

        $data['createSemaine'] = $this->nouveauModel->createSemaine($data['jour']);
        $startDate = date('Y-m-d', strtotime('+'.(1-$data['jour']).' days'));
        $endDate = date('Y-m-d', strtotime('+'.(7-$data['jour']).' days'));
        $data['liste_rdv'] = $this->nouveauModel->getRdvData($startDate,  $endDate);

        echo view('dashboard', $data);
    }

}