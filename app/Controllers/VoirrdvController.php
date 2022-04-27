<?php

namespace App\Controllers;

use App\Models\VoirrdvModel;
use CodeIgniter\API\ResponseTrait;

class VoirrdvController extends BaseController
{
    use ResponseTrait;
    protected $db;
    protected $nouveauModel;

    public function __construct() {
        helper(['form', 'url']);
        $this->db = \Config\Database::connect();
        // load model //
        $this->nouveauModel = new \App\Models\VoirrdvModel();
        $this->model = new VoirrdvModel();

    }

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

    public function update(){

        /* calling the update function on model sending the form */
        $this->model->init_update($this->request->getVar());

        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>La modification a bien été appliquée</b></div>");

        /* return to default page */
        return redirect()->to(site_url("/Voirrdv"));


    }

    public function delete($id = NULL){

        /* calling the delete function on model sending the url id */
        $this->model->init_delete($id);
         /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Votre rendez-vous à été supprimé</b></div>");

        /* return to default page */
        return redirect()->to(site_url("/Voirrdv"));

    }

    // API
      // ionic --> get data de user
      public function indexApi() {
        // $data['jour'] = $this->nouveauModel->getDateOfFirstDayOfTheWeekToDisplay(
        //     $this->request->getVar('dateDebut'), $this->request->getVar('dateFin')
        // );
        $startDate = date('Y-m-d', strtotime($this->request->getVar('dateDebut')));
        $endDate = date('Y-m-d',strtotime($this->request->getVar('dateFin')));

        $data = $this->model->getRdvDataApi($startDate, $endDate);
        return $this->respond($data);
    }

    // public function getWeekApi() {
    //     $data['jour'] = $this->nouveauModel->getDateOfFirstDayOfTheWeekToDisplay($this->request->getVar('semaine'), $this->request->getVar('jour'));
    //     $weekData = $this->nouveauModel->createSemaine($data['jour']);

    //     return $this->respond($weekData);
    // }


}