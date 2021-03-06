<?php
namespace App\Models;

use CodeIgniter\Model;

class CompteRenduModel extends Model
{
    protected $table = 'compteRendu';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'Datevisite',
        'DateCR',
        'ImpacteVisite',
        'MotifVisite',
        'CoefConf',
        'Praticien',
        'Remplacant',
        'texte',

    ];


    protected $db;
    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
        helper('securedata');

    }

    //insertion des clients en bdd dans la table nouveau
    public function insertCompteRendu($data) {
        $builder = $this->db->table('compteRendu');
        $builder->insert($data);
        

    }

    // recuperation en bdd dans la view controller
   public function getCompteRendu(){
        $builder = $this->db->table('compteRendu');
        $builder->join('listePraticien', 'listePraticien.id = compteRendu.Praticien');
        $builder->join('listeRemplacant', 'listeRemplacant.id = compteRendu.Remplacant');
        $builder->join('listeMotifVisite', 'listeMotifVisite.id = compteRendu.MotifVisite');
        $builder->join('users', 'users.id = compteRendu.fkUsers');

        $builder->select('compteRendu.id as id, listePraticien.nom as nom,listePraticien.id as PraticienId, listePraticien.prenom as prenom, compteRendu.DateCR as DateCR, compteRendu.Datevisite as Datevisite,compteRendu.texte as Texte, listeRemplacant.id as RemplacantId, listeRemplacant.nomRemplacant as RemplacantNom, listeRemplacant.prenomRemplacant as RemplacantPrenom, listeMotifVisite.id as MotifId, listeMotifVisite.motif as Motif, compteRendu.CoefConf as CoefConf,compteRendu.ImpacteVisite as ImpacteVisite, users.name as visNom, users.prenom as visPrenom');
        
        if(session()->get('role') != 3){
            $builder->where(session()->get('id').'=compteRendu.fkUsers');
        }
        $query=$builder->get();
        return $query->getResultArray();
    }

    // recuperation en bdd la liste des praticien a mettre dans le select
   public function insertPraticienSelect(){
        $builder = $this->db->table('listePraticien');
        $builder->select('*');
        $query=$builder->get();
        return $query->getResultArray();
    }
    // recuperation en bdd la liste des praticien a mettre dans le select
   public function insertPraticienToConsultation(){
        $builder = $this->db->table('listePraticien');
        $builder->select('*');
        $query=$builder->get();
        return $query->getResultArray();
    }
    // recuperation en bdd la liste des praticien a mettre dans le select
   public function insertRemplacantToConsultation(){
        $builder = $this->db->table('listeRemplacant');
        $builder->select('*');
        $query=$builder->get();
        return $query->getResultArray();
    }
    // recuperation en bdd la liste des praticien a mettre dans le select
   public function insertMotifToConsultation(){
        $builder = $this->db->table('listeMotifVisite');
        $builder->select('*');
        $query=$builder->get();
        return $query->getResultArray();
    }

    //Recuperation listeMedicament dans le select
    public function insertListeMedicamentSelect(){
        $builder = $this->db->table('listeMedicament');
        $builder->select('id, MED_NOMCOMMERCIAL');
        $query=$builder->get();
        return $query->getResultArray();
    }


    // recuperation en bdd dans la view controller
   public function insertRempacantSelect(){
        $builder = $this->db->table('listeRemplacant');
        $builder->select('*');
        $query=$builder->get();
        return $query->getResultArray();
    }


    // recuperation en bdd dans la view controller
   public function insertMotifVisiteSelect(){
        $builder = $this->db->table('listeMotifVisite');
        $builder->select('*');
        $query=$builder->get();
        return $query->getResultArray();
    }


    /* receive users */
    public function getUsers($id = null){

        /* return all users */
        if($id) return $this->findAll();

        /* return user by id */
        return $this->find($id);

    }





    public function init_update($data = NULL) {

        /* update a user by your id (primary key) */
        return $this->update($data["id"], $data);

    }


    public function init_delete($id){

        /* delete a user by your id */
        $this->delete($id);

    }


    // API REQUEST
    public function getCompteRenduApi(){
        $id = session('id');

        $builder = $this->db->table('compteRendu');
        $builder->join('listePraticien', 'listePraticien.id = compteRendu.Praticien');
        $builder->join('listeRemplacant', 'listeRemplacant.id = compteRendu.Remplacant');
        $builder->join('listeMotifVisite', 'listeMotifVisite.id = compteRendu.MotifVisite');
        $builder->join('users', 'users.id = compteRendu.fkUsers');

        $builder->select('compteRendu.id as id, listePraticien.nom as nom,listePraticien.id as PraticienId, listePraticien.prenom as prenom, compteRendu.DateCR as DateCR, compteRendu.Datevisite as Datevisite,compteRendu.texte as Texte, listeRemplacant.id as RemplacantId, listeRemplacant.nomRemplacant as RemplacantNom, listeRemplacant.prenomRemplacant as RemplacantPrenom, listeMotifVisite.id as MotifId, listeMotifVisite.motif as Motif, compteRendu.CoefConf as CoefConf,compteRendu.ImpacteVisite as ImpacteVisite, users.name as visNom, users.prenom as visPrenom');
        
        // if(session()->get('role') != 3){
            $builder->where($id.'=compteRendu.fkUsers');
        // }
        $query=$builder->get();
        return $query->getResultArray();
    }








}


?>