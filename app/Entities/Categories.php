<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Categories extends Entity
{
    protected $attributes = [
        "id" => null,
        "name" => null,
    ];
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at', 
        'deleted_at'
    ];
    protected $casts   = [];

    public function setName($name){
        $this->attributes['name'] = ucfirst($name);
    }
    public function getNanme(){
        return $this->attributes['name'];
    }
    
}
