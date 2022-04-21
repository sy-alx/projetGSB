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
        $builder->join('users', 'users.id = compterendu.fkUsers');

        $builder->select('DateCR');
        if(session()->get('role') != 3){
            $builder->where(session()->get('id').'=compterendu.fkUsers');
        }

        $builder->orderBy('DateCR', 'DESC');

         $query=$builder->get();


        return $query->getFirstRow();


    }

    public function getrdvavenirCetteSemaine(){
        $today = date('Y-m-d');
        $AnneMoisDebutSemaine = date('Y-m');
        $premierJourSemaine = date('d', strtotime("this week"));
        $dernierJourSemaine = $premierJourSemaine + 4;

        $builder = $this->db->table('rdv');
        $builder->join('compterendu', 'rdv.id = compterendu.idRdv');
        $builder->select('count(rdv.id) as nbrRdv');
        $builder->where('date_rdv >= ', $today);
        $builder->where('date_rdv <=', $AnneMoisDebutSemaine.'-'.$dernierJourSemaine);        
        $builder->where(session()->get('id').'= compterendu.fkUsers');
        $query=$builder->get();
        return $query->getResultArray();
    }



}
?>