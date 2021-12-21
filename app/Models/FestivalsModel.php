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
    public function findFestivalsDatatable($limitStart, $limitLenght) {
        return $this->limit($limitLenght, $limitStart)
                    ->find();
    }
    public function findFestivalsByCategory($category_id = null){
        if (is_null($category_id)){
            return $this->findAll();
        }
        return $this -> where(['category_id' => $category_id])
                     ->find();
    }
    public function findFestivalsByUnderPrice($price = null){
        if (is_null($price)){
            return $this->findAll();
        }
        //Asi se hacen menor o mayor
        return $this -> where(['price <=' => $price])
                     ->find();
    }
    public function findFestivalsByOverPrice($price = null){
        if (is_null($price)){
            return $this->findAll();
        }
        //Asi se hacen menor o mayor
        return $this -> where(['price >=' => $price])
                     ->find();
    }
    public function findFestivalsByUnderDate($date = null){
        if (is_null($date)){
            return $this->findAll();
        }
        //Asi se hacen menor o mayor
        return $this -> where(['date <=' => $date])
                     ->find();
    }
    public function findFestivalsByOverDate($date = null){
        if (is_null($date)){
            return $this->findAll();
        }
        //Asi se hacen menor o mayor
        return $this -> where(['date >=' => $date])
                     ->find();
    }
}
