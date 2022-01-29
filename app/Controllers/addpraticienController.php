<?php

/**
 *  Example of a CRUD using CODE IGNITER 4 and MYSQL
 *  By: @mathmed
 *  https://github.com/mathmed
 */

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\addpraticienModel;
use Config\Services\session;

/* Users Controller */

class addpraticienController extends Controller {

    function __construct(){

        /* Loading user modal and session library */
        $this->model = new addpraticienModel();
        $this->session = \Config\Services::session();

    }

    /* default function called */
    public function index(){
        $data = array(
            "TITRE_PAGE" => "Info médicaments",
            "CONTENT_PAGE" =>  "addpraticien",
        );

        /* sending users list and session variable to interface */
        $data["users2"] = $this->model->getUsers();
        $data["session"] = $this->session;

        /* loading the views */
        echo view('dashboard', $data);


    }


    /* controller to create a new user */
    public function create(){

        /* calling the insert function on model sending the form */
        $this->model->init_insert($this->request->getVar());

        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Success, user added!</b></div>");

        /* return to default page */
        return redirect()->to(site_url("/Addpraticien"));

    }

    /* controller to update a user */
    public function update(){

        /* calling the update function on model sending the form */
        $this->model->init_update($this->request->getVar());

        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Success, user edited!</b></div>");

        /* return to default page */
        return redirect()->to(site_url("/Addpraticien"));


    }

    /* controller to delete a user */
    public function delete($id = NULL){

        /* calling the delete function on model sending the url id */
        $this->model->init_delete($id);

        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Success, user deleted!</b></div>");

        /* return to default page */
        return redirect()->to(site_url("/Addpraticien"));

    }

}
