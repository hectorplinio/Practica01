<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Entities\Roles;
use App\Libraries\UtilLibrary;
use App\Models\RolesModel;
use CodeIgniter\Exceptions\PageNotFoundException;


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
    public function viewEditRoles($id=""){
       
        if(strcmp($id,"")===0){
            //Si no llega el id estoy creando
            $data["title"]="Nuevo Rol";
            $data["rol"]=new Roles();
            
        }else{
            $rM = new RolesModel();
            $rol = $rM->findRoles($id);
            if(is_null($rol))
                throw PageNotFoundException::forPageNotFound();
                $data["title"]="Editar Rol";
                $data["rol"]=$rol;
                
        }
        
        return view ("Administration/roles_edit", $data);
    }
    public function saveRoles(){
        $util = new UtilLibrary();
        try{
            $request= $this->request;
            $rolM = new RolesModel();
            $data = [
                'id'=>$request->getVar("id"),
                'name'=>$request->getVar("name"),
            ];
            if(strcmp($data['id'],"")!==0){
                $roles = $rolM->findRoles($data["id"]);
                if(is_null($roles))
                    return $util->getResponse("KO_NOT_FOUND", "El festival que quieres editar no esta en la BBDD");
            }else{
                $roles = new Roles();
            }
            $roles->fill($data);
            $rolM->save($roles);
            return $util->getResponse("Ok", "Festival guardado correctamente");

        }catch(\Exception $e){
            return $util->getResponse("KO", "Se ha producido un error", $e);
        }
    }
}
