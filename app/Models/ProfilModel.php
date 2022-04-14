<?php
namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table = 'rdv';
    protected $primaryKey = 'id_rdv';
    protected $db;
    protected $allowedFields = [
        'date_rdv',
        'heure_rdv'
    ];


    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
        helper('securedata');
    }

    public function getrdvrecent() {
        $builder = $this->db->table('compterendu');
        $builder->select('Datevisite');
        $builder->orderBy('Datevisite', 'ASC');

         $query=$builder->get();


        return $query->getFirstRow();


    }



}
?>