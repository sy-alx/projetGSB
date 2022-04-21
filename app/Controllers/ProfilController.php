<?php

namespace App\Controllers;

use App\Models\ProfilModel;

class ProfilController extends BaseController
{

    protected $db;
    protected $nouveauModel;

    public function __construct() {
        helper(['form', 'url']);
        $this->db = \Config\Database::connect();
        // load model //
        $this->nouveauModel = new \App\Models\ProfilModel();
        $this->model = new ProfilModel();

    }
    public function index()
    {
        $data = array(
            "TITRE_PAGE" => "Profil",
            "CONTENT_PAGE" =>  "profil",
        );
        $data['rdvrecent'] = $this->nouveauModel->getrdvrecent();
        $data['rdvavenirCetteSemaine'] = $this->nouveauModel->getrdvavenirCetteSemaine();

        echo view('dashboard', $data);
    }

}