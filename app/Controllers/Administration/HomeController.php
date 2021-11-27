<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function home (){
        $data = array(
            "title" => "Administration",
        );
        return view ("Administration/home", $data);
    }
}
