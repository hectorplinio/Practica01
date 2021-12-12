<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;
use App\Libraries\UtilLibrary;
use App\Models\UsersModel;
use Exception;

class LoginController extends BaseController
{
    public function login (){
        $data = array(
            "title" => "Login",
        );
        
        return view ("PublicSection/login", $data);
    }
    public function formulario(){
        try{   
            $request = $this->request;
            $email = $request->getVar('email'); 
            $pass = $request->getVar('password');
            $util = new UtilLibrary();
            $user = new UsersModel();
            $users = $user->findUsersEmail($email);
            if ($users != null ){
                $pass_hash = $users->password;
                if(password_verify($pass, $pass_hash)){
                    $response= $util -> getResponse("OK", "Usuario encontrado", "");
                }else{
                    $response= $util -> getResponse("OK", "Usuario encontrado pero contraseña no coincide", "");
                }
            }else{
                    $response= $util-> getResponse("OK", "Usuario no encontrado","");
            }
        } catch(\Exception $e){
            return $util-> getResponse("KO", "Error",$e->getMessage());
        }
        
        return ($response);
    }
}
