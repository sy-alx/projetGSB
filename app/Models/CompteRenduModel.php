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
        $builder->select('*');
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

}


?>