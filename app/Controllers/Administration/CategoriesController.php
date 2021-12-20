<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class CategoriesController extends BaseController
{
    public function home (){
        $data = array(
            "title" => "Listado de categories",
        );
        return view ("Administration/categories", $data);
    }
}
