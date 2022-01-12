<?php
namespace App\Models;

use CodeIgniter\Model;

class NouveauModel extends Model
{
    protected $table = 'nouveau';
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

        $builder = $this->db->table('nouveau');
        $builder->insert($data);

    }

    // recuperation en bdd dans la view controller
   public function getCompteRendu(){
        $builder = $this->db->table('nouveau');
        $builder->select('id , Praticien , Datevisite , texte , Datevisite , DateCR  ');
        $query=$builder->get();
        return $query->getResultArray();
    }

}


?>