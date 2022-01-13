<?php

namespace App\Controllers;
use CodeIgniter\Database;


class EditController extends BaseController
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
            "CONTENT_PAGE" =>  "edit",
        );

        echo view('dashboard', $data);
    }


}