<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        //return view('accueil');
        return redirect()->to('/AccueilController');
    }
}
