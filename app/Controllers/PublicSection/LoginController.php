<?php

namespace App\Controllers\PublicSection;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class LoginController extends BaseController
{
    public function login (){
        $data = array(
            "title" => "Login",
        );
        
        return view ("PublicSection/login", $data);
    }
    public function pruebaAjax(){
        $response = [
            "status" => "OK",
            "message" => "Ha ido bien",
            "data" => ""
        ];
        try {
            return json_encode($response);
        } catch(\Exception $e) {
            $response["status"] = "KO";
            $response["message"] = "Ha ido mal";
            return json_encode($response);
        }
    }
    public function formulario(){
        $request = $this->request;
        $email = $request->getVar('email'); 
        $pass = $request->getVar('pass');
        
        $user = new UsersModel();
        $users = $user->findUsersEmail($email);
        if ($users != null ){
            $response = [
                "status" => "OK",
                "message" => "Email encontrado",
                "data" => ""
            ];
        }else{
            $users = $user->findUsersSurname($email);
            if ($users != null){
                $response = [
                    "status" => "OK",
                    "message" => "Username encontrado",
                    "data" => ""
                ];
            }else{
                $response = [
                    "status" => "OK",
                    "message" => "Email y usuario no encontrado",
                    "data" => ""
                ];
            }
        }
        
        return json_encode($response);

        echo $email;
        // try {
        //     $request = $this -> request;
        //     echo '<script language="javascript">alert("juas");</script>';
        //     if ($request->isAJAX()){
        //         if ($request ->getMethod() == "POST"){
        //             $user = new UsersModel();
        //             $users = $user->findAll();
        //             echo $users;
        //             //return $this->getResponse("OK", "Peticion POST correcta", $users);
        //         }else{
                    
        //         }
        //     }
        // } catch(\Exception $e) {
        //     $response["status"] = "KO";
        //     $response["message"] = "Ha ido mal";
        //     return json_encode($response);
        // }
    }
}
