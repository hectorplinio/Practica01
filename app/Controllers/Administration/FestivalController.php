<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Entities\Categories;
use App\Entities\Festivals;
use App\Libraries\UtilLibrary;
use App\Models\CategoriesModel;
use App\Models\FestivalsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class FestivalController extends BaseController
{
    public function home (){
        $data = array(
            "title" => "Listado de festivals",
        );
        return view ("Administration/festivals", $data);
    }
    public function getFestivalsData() {

        $request = $this->request;

        $limitStart = $request->getVar("start");
        $limitLenght = $request->getVar("length");
        $draw = $request->getVar("draw");

        $festM = new FestivalsModel();

        $festivals = $festM->findFestivalsDatatable($limitStart, $limitLenght);

        $totalRecords = $festM->countAllResults();

        $json_data = array(
            "draw" => $draw, 
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $festivals,
        );

        return json_encode($json_data);
    }
    public function deleteFestival() {
        try{
            $request = $this->request;
            $data = $request->getJSON();
            $id = $data->id;
    
            $util = new UtilLibrary();
            $festM = new FestivalsModel();
    
            $festivals = $festM->findFestivalsDelete($id);
            if ($festivals){
                return $response= $util -> getResponse("OK", "Usuario eliminado correctamente", $festivals);
            }else{
                return $response= $util -> getResponse("KO", "Usuario no se ha podido eliminado", $festivals);

            }
        }catch(\Exception $e){
            return $util-> getResponse("KO", "Error",$e->getMessage());

        }
        
    }
    public function saveFestival(){
        $util = new UtilLibrary();
        try{
            $request= $this->request;
            $festM = new FestivalsModel();
            $data = [
                'id'=>$request->getVar("id"),
                'name'=>$request->getVar("name"),
                'email'=>$request->getVar("email"),
                'date'=>$request->getVar("date"),
                'price'=>$request->getVar("price"),
                'address'=>$request->getVar("address"),
                'image_url'=>$request->getVar("image_url"),
                'category_id'=>$request->getVar("category_id"),

            ];
            if(strcmp($data['id'],"")!==0){
                $festival = $festM->findFestivals($data["id"]);
                if(is_null($festival))
                    return $util->getResponse("KO_NOT_FOUND", "El festival que quieres editar no esta en la BBDD");
            }else{
                $festival = new Festivals();
            }
            $festival->fill($data);
            $festM->save($festival);
            return $util->getResponse("Ok", "Festival guardado correctamente");

        }catch(\Exception $e){
            return $util->getResponse("KO", "Se ha producido un error", $e);
        }
    }
    public function viewEditFestival($id=""){
        
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
            $data["title"]="Nuevo Festival";
            $data["festival"]=new Festivals();
            $catM=new CategoriesModel();
            $data["categories"]=$catM->findCategories();

        }else{
            $fM = new FestivalsModel();
            $festival = $fM->findFestivals($id);
            if(is_null($festival))
                throw PageNotFoundException::forPageNotFound();
                $data["title"]="Editar Festival";
                $data["festival"]=$festival;
                $catM=new CategoriesModel();
                $data["categories"]=$catM->findCategories();
        }
        
        return view ("Administration/festivals_edit", $data);
    }
}
