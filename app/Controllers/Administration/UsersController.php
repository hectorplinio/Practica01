<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class UsersController extends BaseController
{
    public function home (){
        $data = array(
            "title" => "Listado de users",
        );
        return view ("Administration/users", $data);
    }
}
