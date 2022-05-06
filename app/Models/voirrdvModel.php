<?php
namespace App\Models;

use CodeIgniter\Model;

class VoirrdvModel extends Model
{
    protected $table = 'rdv';
    protected $primaryKey = 'id';
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

    public function getRdvData($startDate = null, $endDate = null) {
        $builder = $this->db->table('rdv');
        $builder->join('compteRendu', 'rdv.id = compteRendu.idRdv');
        $builder->join('listePraticien', 'compteRendu.Praticien = listePraticien.id');
        $builder->join('listeRemplacant', 'compteRendu.Remplacant = listeRemplacant.id', 'left');
        $builder->select('rdv.id, rdv.date_rdv, rdv.heure_rdv, listePraticien.nom as nomPraticien, listePraticien.prenom as prenomPraticien, listePraticien.adresse, listePraticien.numero, listePraticien.codePostal');
        if($startDate){
            $builder->where('date_rdv >= ', $startDate);
        }
        if($endDate){
            $builder->where('date_rdv <=', $endDate);
        }
        $builder->where(session()->get('id').'= compteRendu.fkUsers');
        $query=$builder->get();
        return $query->getResultArray();
    }

    public function getDateOfFirstDayOfTheWeekToDisplay($weekBeforeOrAfter, $referenceDate){
        if(!$referenceDate) {
            return date('w');
        }
        elseif($weekBeforeOrAfter == 1) {
            return $referenceDate + 7;
        }
        else if($weekBeforeOrAfter == 2) {
            return  $referenceDate - 7;
        }
        else {
            return date('w');
        }
    }

    public function createSemaine($jour){
        $sub = array();
            for($i=1;$i<=7;$i++){
                $sub[] = date('d-m-Y', strtotime('+'.($i-$jour).' days'));
            }
            return $sub;
    }

    public function init_update($data = NULL) {

        /* update a user by your id (primary key) */
        $this->update($data["id"], $data);

    }

    public function init_delete($id){

        //Met à null la foreign key
        $builder = $this->db->table('compteRendu');
        $builder->join('rdv', 'rdv.id = compteRendu.idRdv');
        $builder->select('compteRendu.idRdv');
        $builder->where('compteRendu.idRdv='.$id);
        $builder->set('idRdv', null);
        $builder->update();
        /* delete rdv */
        $this->delete($id);

    }

    // API
    public function getRdvDataApi($startDate = null, $endDate = null) {
        $id = session('id');

        $builder = $this->db->table('rdv');
        $builder->join('compteRendu', 'rdv.id = compteRendu.idRdv');
        $builder->join('listePraticien', 'compteRendu.Praticien = listePraticien.id');
        $builder->join('listeRemplacant', 'compteRendu.Remplacant = listeRemplacant.id', 'left');
        $builder->select('rdv.id, rdv.date_rdv, rdv.heure_rdv, listePraticien.nom as nomPraticien, listePraticien.prenom as prenomPraticien, listePraticien.adresse, listePraticien.numero, listePraticien.codePostal');
        if($startDate){
            $builder->where('date_rdv >= ', $startDate);
        }
        if($endDate){
            $builder->where('date_rdv <=', $endDate);
        }
        $builder->where($id.'= compteRendu.fkUsers');
        $query=$builder->get();
        return $query->getResultArray();
    }

}
?>