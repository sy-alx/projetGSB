<?php

/**
 *  Example of a CRUD using CODE IGNITER 4 and MYSQL
 *  By: @mathmed
 *  https://github.com/mathmed
 */

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;
use Config\Services\session;

/* Users Controller */

class addvisiteurController extends Controller {

    function __construct(){

        /* Loading user modal and session library */
        $this->model = new UserModel();
        $this->session = \Config\Services::session();

    }

    /* default function called */
    public function index(){
        $data = array(
            "TITRE_PAGE" => "Ajouter visiteur",
            "CONTENT_PAGE" =>  "addvisiteur",
        );

        /* sending users list and session variable to interface */
        $data["listeVisiteur"] = $this->model->getUsers();
        $data["session"] = $this->session;
        $data['listeRegion'] = $this->model->insertVisiteurRegion();


        /* loading the views */
        echo view('dashboard', $data);


    }


    /* controller to create a new user */
    public function create(){

        /* calling the insert function on model sending the form */
        $data = $this->request->getVar();
        $data ["password"] = password_hash($data ["password"], PASSWORD_DEFAULT);
        $this->model->init_insert($data);

        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Merci le praticien a bien été crée</b></div>");

        /* return to default page */
        return redirect()->to(site_url("/Addvisiteur"));

    }

    /* controller to update a user */
    public function update(){
        $data = $this->request->getVar();
        $data ["password"] = password_hash($data ["password"], PASSWORD_DEFAULT);

        /* calling the update function on model sending the form */
        $this->model->init_update($data);

        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>La modification a bien été appliquée</b></div>");

        /* return to default page */
        return redirect()->to(site_url("/Addvisiteur"));


    }

    /* controller to delete a user */
    public function delete($id = NULL){

        /* calling the delete function on model sending the url id */
        $this->model->init_delete($id);
        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Nous avons bien pris en compte votre suppression de praticien</b></div>");

        /* return to default page */
        return redirect()->to(site_url("/Addvisiteur"));

    }

}
