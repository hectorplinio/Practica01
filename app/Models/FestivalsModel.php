<?php

namespace App\Models;

use App\Entities\Festivals;
use CodeIgniter\Model;

class FestivalsModel extends Model
{
    protected $table            = 'Festivals';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Festivals::class;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ["name", "email", "date", "price", "address", "image_url", "category_id"];

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
    public function findFestivals($id = null){
        if (is_null($id)){
            return $this->findAll();
        }
        return $this -> where(['id' => $id])
                     ->first();
    }
    public function findFestivalsByCategory($category_id = null){
        if (is_null($category_id)){
            return $this->findAll();
        }
        return $this -> where(['category_id' => $category_id])
                     ->find();
    }
}
