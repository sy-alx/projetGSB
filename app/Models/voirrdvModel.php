<?php
namespace App\Models;

use CodeIgniter\Model;

class VoirrdvModel extends Model
{
    protected $table = 'rdv';
    protected $primaryKey = 'id_rdv';
    protected $db;


    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
        helper('securedata');
    }

    public function getRdvData($startDate = null, $endDate = null) {
        $builder = $this->db->table('rdv');
        $builder->select('date_rdv, heure_rdv');
        if($startDate){
            $builder->where('date_rdv > ', $startDate);
        }
        if($endDate){
            $builder->where('date_rdv <', $endDate);
        }
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
}
?>