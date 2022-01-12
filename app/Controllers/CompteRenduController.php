<?php

namespace App\Controllers;
use CodeIgniter\Database;


class CompteRenduController extends BaseController
{
    protected $db;
    protected $nouveauModel;

    public function __construct() {
        helper(['form', 'url']);
        $this->db = \Config\Database::connect();
        // load model //
        $this->nouveauModel = new \App\Models\CompteRenduModel();
    }
    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Saisir mes rendez-vous",
            "CONTENT_PAGE" =>  "compterendu",
        );
        echo view('dashboard', $data);
    }

        // Récuperer les données du formulaire compte rendu
   /* public function store()
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

    }*/







    // Fonction pour envoyer des emails si validation ok
    public function formulairecontact()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'Datevisite' => 'required',
            'Praticien' => 'required',
            'Remplacant' => 'required',
            'ImpacteVisite' => 'required',
            'CoefConf' =>'required',
            'MotifVisite' => 'required',
            'texte' => 'required',

        ]);

        if($validation->withRequest($this->request)->run())
        {

            // BDD
            $dataclients = [
                'Datevisite' => $this->request->getPost('Datevisite'),
                'Praticien' => $this->request->getPost('Praticien'),
                'Remplacant'=> $this->request->getPost('Remplacant'),
                'ImpacteVisite' => $this->request->getPost('ImpacteVisite'),
                'CoefConf'=> $this->request->getPost('CoefConf'),
                'MotifVisite'=> $this->request->getPost('MotifVisite'),
                'texte'=> $this->request->getPost('texte'),

            ];

            $this->nouveauModel->insertCompteRendu($dataclients);







            // redirect()->to('/Contact');
            return redirect()->to(site_url("CompteRendu?is_valid=1"));
        } else {

            return redirect()->to(site_url("CompteRendu?is_valid=0"));
        }
    }
}