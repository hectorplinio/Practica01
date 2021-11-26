<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function login (){
        
        return view ("PublicSection/login");
    }
}
