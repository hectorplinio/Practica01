<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Libraries\UtilLibrary;
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
    public function deleteUsers() {
        try{
            $request = $this->request;
            $data = $request->getJSON();
            $id = $data->id;
    
            $util = new UtilLibrary();
            $userM = new UsersModel();
    
            $users = $userM->findUsersDelete($id);
            if ($users){
                return $response= $util -> getResponse("OK", "Usuario eliminado correctamente", $users);
            }else{
                return $response= $util -> getResponse("KO", "Usuario no se ha podido eliminado", $users);

            }
        }catch(\Exception $e){
            return $util-> getResponse("KO", "Error",$e->getMessage());

        }
        
    }
}
