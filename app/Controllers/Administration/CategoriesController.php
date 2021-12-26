<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Libraries\UtilLibrary;
use App\Models\CategoriesModel;

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
}
