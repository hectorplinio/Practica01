<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class RolesController extends BaseController
{
    public function home (){
        $data = array(
            "title" => "Listado de roles",
        );
        return view ("Administration/roles", $data);
    }
}
