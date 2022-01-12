<?php
namespace App\Models;

use CodeIgniter\Model;

class MedicamentModel extends Model
{
    protected $db;
    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
        helper('securedata');

    }

    protected $table = 'medicamentProduit';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nom',
        'type',
        'lorem',
        'note',

    ];



    //insertion des clients en bdd dans la table nouveau
    public function insertMedicamentProduits($data) {

        $builder = $this->db->table('medicamentProduit');
        $builder->insert($data);

    }

    // recuperation en bdd dans la view controller
    public function getMedicamentProduits(){
        $builder = $this->db->table('medicamentProduit');
        $builder->select('id , nom , type , lorem , note');
        $query=$builder->get();
        return $query->getResultArray();
    }



}


?>