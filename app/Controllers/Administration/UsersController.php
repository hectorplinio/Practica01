<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Entities\Users;
use App\Libraries\UtilLibrary;
use App\Models\RolesModel;
use App\Models\UsersModel;
use CodeIgniter\Exceptions\PageNotFoundException;


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
    public function viewEditUsers($id=""){
        
        // if($id){
        //     $data = array(
        //         "title" => "Editar festival",
        //     );
        // }else{
        //     $data = array(
        //         "title" => "Nuevo festival",
        //     );
        // }
        if(strcmp($id,"")===0){
            //Si no llega el id estoy creando
            $data["title"]="Nuevo Usuario";
            $data["user"]=new Users();
            $rolM=new RolesModel();
            $data["roles"]=$rolM->findRoles();
            

        }else{
            $usM = new UsersModel();
            $user = $usM->findUsersId($id);
            if(is_null($user))
                throw PageNotFoundException::forPageNotFound();
                $data["title"]="Editar Usuario";
                $data["user"]=$user;
                $rolM=new RolesModel();
                $data["roles"]=$rolM->findRoles();
                
        }
        
        return view ("Administration/users_edit", $data);
    }
    public function saveUsers(){
        $util = new UtilLibrary();
        try{
            $request= $this->request;
            $userM = new UsersModel();
            $password = $request->getVar("password");
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $data = [
                'id'=>$request->getVar("id"),
                'username'=>$request->getVar("username"),
                'email'=>$request->getVar("email"),
                'name'=>$request->getVar("name"),
                'surname'=>$request->getVar("surname"),
                'password'=>$password_hash,
            ];
            if(strcmp($data['id'],"")!==0){
                $users = $userM->findUsersId($data["id"]);
                if(is_null($users))
                    return $util->getResponse("KO_NOT_FOUND", "El festival que quieres editar no esta en la BBDD");
            }else{
                $users = new Users();
            }
            $users->fill($data);
            $userM->save($users);
            return $util->getResponse("Ok", "Festival guardado correctamente");

        }catch(\Exception $e){
            return $util->getResponse("KO", "Se ha producido un error", $e);
        }
    }
}
