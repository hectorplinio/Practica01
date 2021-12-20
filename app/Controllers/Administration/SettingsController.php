<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;

class SettingsController extends BaseController
{
    public function home (){
        $data = array(
            "title" => "Settings",
        );
        return view ("Administration/settings", $data);
    }
}
