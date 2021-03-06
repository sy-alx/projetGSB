<?php

namespace App\Controllers;

use App\Models\CompteRenduModel;
use App\Models\VoirrdvModel;
use App\Models\MedicamentModel;
use CodeIgniter\API\ResponseTrait;

class CompteRenduController extends BaseController
{
    protected $db;
    protected $nouveauModel;
    use ResponseTrait;

    public function __construct() {
        helper(['form', 'url']);
        $this->db = \Config\Database::connect();
        // load model //
        $this->nouveauModel = new \App\Models\CompteRenduModel();
        $this->model = new CompteRenduModel();

    }


    public function index()
    {
        $data["compteRendu"] = $this->model->getUsers();

        $data = array(
            "TITRE_PAGE" => "Saisir mes rendez-vous",
            "CONTENT_PAGE" =>  "compterendu",
        );
        $data['listePraticien'] = $this->nouveauModel->insertPraticienSelect();
        $data['listeRemplacant'] = $this->nouveauModel->insertRempacantSelect();
        $data['listeMotifVisite'] = $this->nouveauModel->insertMotifVisiteSelect();
        $data['listeMedicament'] = $this->nouveauModel->insertListeMedicamentSelect();



        $data["compteRendu"] = $this->model->getUsers();

        echo view('dashboard', $data);
    }

    // ionic --> get data de user
    public function indexApi() {
        // Faire requete dans model
        $dataPraticien = $this->model->insertPraticienSelect();
        $dataRemplacant = $this->model->insertRempacantSelect();
        $dataMedicament = $this->model->insertListeMedicamentSelect();
        $dataMotif = $this->model->insertMotifVisiteSelect();
        $data = [$dataPraticien, $dataRemplacant, $dataMedicament, $dataMotif];
        return $this->respond($data);
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
            if($this->request->getPost('idEchantillon')!=null){
                $dataclients = [
                    'Datevisite' => $this->request->getPost('Datevisite'),
                    'DateCR' => $this->request->getPost('DateCR'),
                    'Praticien' => $this->request->getPost('Praticien'),
                    'Remplacant'=> $this->request->getPost('Remplacant'),
                    'ImpacteVisite' => $this->request->getPost('ImpacteVisite'),
                    'CoefConf'=> $this->request->getPost('CoefConf'),
                    'MotifVisite'=> $this->request->getPost('MotifVisite'),
                    'fkUsers'=> session()->get('id'),
                    'texte'=> $this->request->getPost('texte'),

                    'idMedicament' => $this->request->getPost('idEchantillon')
                
                ];
            }else{
                $dataclients = [
                    'Datevisite' => $this->request->getPost('Datevisite'),
                    'DateCR' => $this->request->getPost('DateCR'),
                    'Praticien' => $this->request->getPost('Praticien'),
                    'Remplacant'=> $this->request->getPost('Remplacant'),
                    'ImpacteVisite' => $this->request->getPost('ImpacteVisite'),
                    'CoefConf'=> $this->request->getPost('CoefConf'),
                    'MotifVisite'=> $this->request->getPost('MotifVisite'),
                    'fkUsers'=> session()->get('id'),
                    'texte'=> $this->request->getPost('texte'),
                
                ];
            }
            $rdvData = array(
                'date_rdv'=> $this->request->getPost('dateRdv'),
                'heure_rdv'=> $this->request->getPost('heureRdv')
            );
            
            $echantillonData = array(
                'id'=>$this->request->getPost('idEchantillon'),
                'MED_NOMBRECHANTILLON'=>$this->request->getPost('MED_NOMBRECHANTILLON')
            );

            if ($dataclients["ImpacteVisite"]<=10 && $dataclients["CoefConf"]<=10) {
                //Si rendez vous existe, insert
                if($rdvData["date_rdv"] && $rdvData["heure_rdv"])  {
                    $rdvModel = new VoirrdvModel();
                    $dataclients['idRdv'] = $rdvModel->insert($rdvData);
                }
                //Si echantillon donné existe, insert
                if($echantillonData["id"] && $echantillonData["MED_NOMBRECHANTILLON"])  {
                    $echantillonModel = new MedicamentModel();
                    $echantillonModel->incrementEchantillon($echantillonData);
                }

                if(($rdvData["date_rdv"] || $rdvData["heure_rdv"]) && (!$rdvData["date_rdv"] || !$rdvData["heure_rdv"]))  {
                    return redirect()->to(site_url("CompteRendu?is_valid=0"));
                }

                 $this->nouveauModel->insertCompteRendu($dataclients);

                 return redirect()->to(site_url("CompteRendu?is_valid=1"));
            }else {

                return redirect()->to(site_url("CompteRendu?is_valid=0"));}
               


        } else {

            return redirect()->to(site_url("CompteRendu?is_valid=0"));
        }
    }


    /*################### Pour faire fonctionner la table et la modification des champs dans consultation ############*/
    public function edit($id){

        echo view('edit');

    }

    /* controller to update a user */
    public function update(){

        /* calling the update function on model sending the form */
        $result = $this->model->init_update($this->request->getVar());
        $this->session->setFlashdata('inputData', $this->request->getVar());
        $this->session->setFlashdata('result', $result);

        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Success, user edited!</b></div>");

        /* return to default page */
        return redirect()->to(site_url("Consultation"));


    }

    /* controller to delete a user */
    public function delete($id = NULL){

        /* calling the delete function on model sending the url id */
        $this->model->init_delete($id);

        /* add success message in flashdata */
        $this->session->setFlashdata('message', "<div class = 'alert alert-success'><b>Success, user deleted!</b></div>");

        /* return to default page */
        return redirect()->to(site_url("/Consultation"));

    }

    /*API */
    public function postCompteRenduApi()
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
            if($this->request->getPost('idEchantillon')!=null){
                $dataclients = [
                    'Datevisite' => $this->request->getVar('Datevisite'),
                    'DateCR' => $this->request->getVar('DateCR'),
                    'Praticien' => $this->request->getVar('Praticien'),
                    'Remplacant'=> $this->request->getVar('Remplacant'),
                    'ImpacteVisite' => $this->request->getVar('ImpacteVisite'),
                    'CoefConf'=> $this->request->getVar('CoefConf'),
                    'MotifVisite'=> $this->request->getVar('MotifVisite'),
                    'fkUsers'=> session()->get('id'),
                    'texte'=> $this->request->getVar('texte'),
                    'idMedicament' => $this->request->getVar('idEchantillon')
                ];
            }else{
                $dataclients = [
                    'Datevisite' => $this->request->getVar('Datevisite'),
                    'DateCR' => $this->request->getVar('DateCR'),
                    'Praticien' => $this->request->getVar('Praticien'),
                    'Remplacant'=> $this->request->getVar('Remplacant'),
                    'ImpacteVisite' => $this->request->getVar('ImpacteVisite'),
                    'CoefConf'=> $this->request->getVar('CoefConf'),
                    'MotifVisite'=> $this->request->getVar('MotifVisite'),
                    'fkUsers'=> session()->get('id'),
                    'texte'=> $this->request->getVar('texte'),

                ];
            }
            $rdvData = array(
                'date_rdv'=> $this->request->getVar('dateRdv'),
                'heure_rdv'=> $this->request->getVar('heureRdv')
            );
            
            $echantillonData = array(
                'id'=>$this->request->getVar('idEchantillon'),
                'MED_NOMBRECHANTILLON'=>$this->request->getVar('MED_NOMBRECHANTILLON')
            );

            if ($dataclients["ImpacteVisite"]<=10 && $dataclients["CoefConf"]<=10) {
                //Si rendez vous existe, insert
                if($rdvData["date_rdv"] && $rdvData["heure_rdv"])  {
                    $rdvModel = new VoirrdvModel();
                    $dataclients['idRdv'] = $rdvModel->insert($rdvData);
                }
                //Si echantillon donné existe, insert
                if($echantillonData != null && $echantillonData["id"] && $echantillonData["MED_NOMBRECHANTILLON"])  {
                    $echantillonModel = new MedicamentModel();
                    $echantillonModel->incrementEchantillon($echantillonData);
                }

                if(($rdvData["date_rdv"] || $rdvData["heure_rdv"]) && (!$rdvData["date_rdv"] || !$rdvData["heure_rdv"]))  {
                    return redirect()->to(site_url("CompteRendu?is_valid=0"));
                }

                 $this->nouveauModel->insertCompteRendu($dataclients);

                 return redirect()->to(site_url("CompteRendu?is_valid=1"));
            }else {

                return redirect()->to(site_url("CompteRendu?is_valid=0"));}
               


        } else {

            return redirect()->to(site_url("CompteRendu?is_valid=0"));
        }
    }



}


