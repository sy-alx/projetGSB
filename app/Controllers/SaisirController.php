<?php

namespace App\Controllers;
use CodeIgniter\Database;


class SaisirController extends BaseController
{
    protected $db;
    protected $nouveauModel;

    public function __construct() {
        helper(['form', 'url']);
        $this->db = \Config\Database::connect();
        // load model //
        $this->nouveauModel = new \App\Models\NouveauModel();
    }
    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Saisir mes rendez-vous",
            "CONTENT_PAGE" =>  "saisir",
        );
        echo view('dashboard', $data);
    }

        // Récuperer les données du formulaire saisir
    public function store()
    {
         // $clients = new Contact_Model();
        $data = array(
            'Datevisite'=> $this->request->getPost('Datevisite'),
            'Praticien'=> $this->request->getPost('Praticien'),
            'Remplacant'=> $this->request->getPost('Remplacant'),
            'ImpacteVisite'=> $this->request->getPost('ImpacteVisite'),
            'CoefConf'=> $this->request->getPost('CoefConf'),
            'MotifVisite'=> $this->request->getPost('MotifVisite'),
            'texte'=> $this->request->getPost('texte'),

        );
        $this->nouveauModel->insertCompteRendu($data);

    }
}