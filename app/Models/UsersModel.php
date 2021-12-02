<?php

namespace App\Models;

use App\Entities\Users;
use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'Users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Users::class;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ["username", "email", "password", "name", "surname", "rol_id"];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];
    public function findUsersId($id = null){
        if (is_null($id)){
            return $this->findAll();
        }
        return $this -> where(['id' => $id])
                     ->first();
    }
    public function findUsersRolId($rol_id = null){
        if (is_null($rol_id)){
            return $this->findAll();
        }
        return $this -> where(['rol_id' => $rol_id])
                     ->find();
    }
}
