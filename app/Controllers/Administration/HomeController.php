<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function home (){
        $data = array(
            "title" => "Inicio",
        );
        return view ("Administration/home", $data);
    }
}
