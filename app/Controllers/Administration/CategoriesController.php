<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Entities\Categories;
use App\Entities\Festivals;
use App\Libraries\UtilLibrary;
use App\Models\CategoriesModel;
use App\Models\FestivalsModel;
use CodeIgniter\Exceptions\PageNotFoundException;


class CategoriesController extends BaseController
{
    public function home (){
        $data = array(
            "title" => "Listado de categories",
        );
        return view ("Administration/categories", $data);
    }
    public function getCategoriesData() {

        $request = $this->request;

        $limitStart = $request->getVar("start");
        $limitLenght = $request->getVar("length");
        $draw = $request->getVar("draw");

        $catM = new CategoriesModel();

        $categories = $catM->findCategoriesDatatable($limitStart, $limitLenght);

        $totalRecords = $catM->countAllResults();

        $json_data = array(
            "draw" => $draw, 
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalRecords,
            "data" => $categories,
        );

        return json_encode($json_data);
    }
    public function deleteCategories() {
        try{
            $request = $this->request;
            $data = $request->getJSON();
            $id = $data->id;
    
            $util = new UtilLibrary();
            $catM = new CategoriesModel();
    
            $categories = $catM->findCategoriesDelete($id);
            if ($categories){
                return $response= $util -> getResponse("OK", "Categoria eliminado correctamente", $categories);
            }else{
                return $response= $util -> getResponse("KO", "Categoria no se ha podido eliminado", $categories);

            }
        }catch(\Exception $e){
            return $util-> getResponse("KO", "Error",$e->getMessage());

        }
        
    }
    public function viewEditCategories($id=""){
        
        if(strcmp($id,"")===0){
            //Si no llega el id estoy creando
            $data["title"]="Nueva Categoria";
            $data["categories"]=new Categories();
            

        }else{
            $fM = new CategoriesModel();
            $categories = $fM->findCategories($id);
            if(is_null($categories))
                throw PageNotFoundException::forPageNotFound();
                $data["title"]="Editar Categoria";
                $data["categories"]=$categories;
                
        }
        
        return view ("Administration/categories_edit", $data);
    }
    public function saveCategories(){
        $util = new UtilLibrary();
        try{
            $request= $this->request;
            $catM = new CategoriesModel();
            $data = [
                'id'=>$request->getVar("id"),
                'name'=>$request->getVar("name"),
            ];
            if(strcmp($data['id'],"")!==0){
                $categories = $catM->findCategories($data["id"]);
                if(is_null($categories))
                    return $util->getResponse("KO_NOT_FOUND", "El festival que quieres editar no esta en la BBDD");
            }else{
                $categories = new Categories();
            }
            $categories->fill($data);
            $catM->save($categories);
            return $util->getResponse("Ok", "Festival guardado correctamente");

        }catch(\Exception $e){
            return $util->getResponse("KO", "Se ha producido un error", $e);
        }
    }
}
