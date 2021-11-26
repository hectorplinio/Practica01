<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function home (){
        
        return view ("PublicSection/home");
    }
}
