<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Libraries\UtilLibrary;
use App\Models\RolesModel;

class RolesController extends BaseController
{
    public function home (){
        $data = array(
            "title" => "Listado de roles",
        );
        return view ("Administration/roles", $data);
    }
    public function getRolesData() {

        $request = $this->request;

        $limitStart = $request->getVar("start");
        $limitLenght = $request->getVar("length");
        $draw = $request->getVar("draw");

        $rolM = new RolesModel();

        $roles = $rolM->findRolesDatatable($limitStart, $limitLenght);

        $totalRecords = $rolM->countAllResults();

        $json_data = array(
            "draw" => $draw, 
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $roles,
        );

        return json_encode($json_data);
    }
    public function deleteRoles() {
        try{
            $request = $this->request;
            $data = $request->getJSON();
            $id = $data->id;
    
            $util = new UtilLibrary();
            $rolM = new RolesModel();
    
            $roles = $rolM->findRolesDelete($id);
            if ($roles){
                return $response= $util -> getResponse("OK", "Usuario eliminado correctamente", $roles);
            }else{
                return $response= $util -> getResponse("KO", "Usuario no se ha podido eliminado", $roles);

            }
        }catch(\Exception $e){
            return $util-> getResponse("KO", "Error",$e->getMessage());

        }
        
    }
}
