<?php

namespace App\Controllers;

use App\Entities\Categories;
use App\Entities\Festivals;
use App\Entities\Roles;
use App\Entities\Users;
use App\Models\CategoriesModel;
use App\Models\FestivalsModel;
use App\Models\UsersModel;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    public function index()
    {
        // $cat = new Categories ();
        // $cat -> setName("titulo de categoria");
        
        // $data = [
        //     "name" => "leyendas",
        //     "email" => "leyendas@gmail.com",
        //     "date" => "2021-05-08",
        //     "price" => "50€",
        // ];
        // $data2 = [
        //     "username" => "hectorplinio",
        //     "email" => "leyendas@gmail.com",
        //     "pass" => "111",
        //     "name" => "Hector",
        // ];
        // $cat = new Festivals($data);
        // $cat3 = new Users($data2);
        // $cat2 = new Roles ();
        // $cat2 -> setName("admin");
        // dd($cat, $cat2, $cat3);
        // $data = [
        //     "name" => "invitado",
        // ];
        // $cat = new Categories($data);
        // $catModel = new CategoriesModel();
        //Esto sirve para guardar el objeto
        // $catModel->save($cat);
        //Esto sirve para buscarlo y cambiarle un valor
        // $catModel = new CategoriesModel();
        // $cat = $catModel->find(2);
        // $cat -> name = "House";
        // $catModel->save($cat);
        // $catModel = new CategoriesModel();
        // $catModel->delete(2);
        // dd($catModel);
        // //$cat = $catModel->find(2);
        //dd($cat);
        //Para eliminar un objeto 
        // $catModel -> delete(2);
        //return view('welcome_message');
        $catModel = new FestivalsModel();
        $cat2 =  new Time('now');
        $cat = $catModel->findFestivalsByUnderDate($cat2);  
        dd($cat);
    }
}
