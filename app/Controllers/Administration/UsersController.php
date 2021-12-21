<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    public function home (){
        $data = array(
            "title" => "Listado de users",
        );
        return view ("Administration/users", $data);
    }
    public function getUsersData() {
        header('Access-Control-Allow-Origin: *');

        $request = $this->request;

        $limitStart = $request->getVar("start");
        $limitLenght = $request->getVar("length");
        $draw = $request->getVar("draw");

        $userM = new UsersModel();

        $users = $userM->findUsersDatatable($limitStart, $limitLenght);

        $totalRecords = $userM->countAllResults();

        $json_data = array(
            "draw" => $draw, 
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $users,
        );

        return json_encode($json_data);
    }
}
