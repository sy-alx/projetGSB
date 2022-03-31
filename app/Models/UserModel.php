<?php

namespace App\Models;
use CodeIgniter\Model;


class UserModel extends Model{

    protected $table = 'users';

    protected $allowedFields = [
        'name',
        'email',
        'password',
        'prenom',
        'telephone',
        'adresse',
        'cp',
        'idRegion'
    ];


    /* name of primary key field */
    protected $primaryKey = "id";


    protected $useTimestamps = true;


    /* automatic date create in database */
    protected $createdField = "created_at";
    protected $updatedField = "updated_at";

    /* receive users */
    public function getUsers($id = null){

        /* return all users */
        if($id) return $this->findAll();

        /* return user by id */
        return $this->find($id);

    }

    public function init_insert($data = NULL){

        /* insert new user in db */
        $this->save($data);

    }

    public function init_update($data = NULL) {

        /* update a user by your id (primary key) */
        $this->update($data["id"], $data);

    }



    public function init_delete($id){

        /* delete a user by your id */
        $this->delete($id);

    }

    // recuperation en bdd la liste des praticien a mettre dans le select
    public function insertVisiteurRegion(){
        $builder = $this->db->table('listeRegion');
        $builder->select('*');
        $query=$builder->get();
        $builder->join('listeRegion', 'listeRegion.id = users.idRegion');
        return $query->getResultArray();
    }

}