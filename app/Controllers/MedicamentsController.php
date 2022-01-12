<?php

namespace App\Controllers;
use CodeIgniter\Database;

class MedicamentsController extends BaseController
{

    protected $db;
    protected $medicamentModel;

    public function __construct() {
        helper(['form', 'url']);
        $this->db = \Config\Database::connect();
        // load model //
        $this->medicamentModel = new \App\Models\MedicamentModel();
    }


    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Info médicaments",
            "CONTENT_PAGE" =>  "medicaments",
        );

        // pour avoir la bdd cablé dans le tableau getMedicamentProduits relier au model MedicamentModel
        $data['medicamentProduit'] = $this->medicamentModel->getMedicamentProduits();
        //  echo '<pre>',print_r($data),'</pre>';

        echo view('dashboard', $data);
    }
    public function formulairecontact()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nom' => 'required',
            'type' => 'required',
            'lorem' => 'required',
            'note' => 'required',
        ]);
        if($validation->withRequest($this->request)->run())
        {

            // BDD
            $dataclients = [
                'nom' => $this->request->getPost('nom'),
                'type' => $this->request->getPost('type'),
                'lorem'=> $this->request->getPost('lorem'),
                'note' => $this->request->getPost('note'),
            ];

            $this->medicamentModel->insertMedicamentProduits($dataclients);

            // redirect()->to('/Contact');
            return redirect()->to(site_url("MedicamentsController?is_valid=1"));
        } else {

            return redirect()->to(site_url("MedicamentsController?is_valid=0"));
        }


    }



}