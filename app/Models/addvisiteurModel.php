<?php

/**
 *  Example of a CRUD using CODE IGNITER 4 and MYSQL
 *  By: @mathmed
 *  https://github.com/mathmed
 */

namespace App\Models;
use CodeIgniter\Model;

/* Users Model */

class addvisiteurModel extends Model{

    /* Name of database table */
    protected $table = "listeVisiteur";

    /* name of primary key field */
    protected $primaryKey = "id";

    /* type of returned data */
    protected $returnType = 'object';

    protected $useTimestamps = true;

    /* default fields that will be inserted */


}
