<?php

namespace App\Controllers\Rest;

use App\Database\Migrations\Categories;
use App\Entities\Categories as EntitiesCategories;
use App\Libraries\UtilLibrary;
use App\Models\CategoriesModel;
use CodeIgniter\RESTful\ResourceController;

class CategoriesController extends ResourceController
{
    protected $modelName = 'App\Models\CategoriesModel';
    protected $format = "json"; 

    public function categoriesRest($id="") {
        try{
            if (strcmp($id,"")!==0){
                $categories = $this->model->findCategories($id);
                if ($categories == null){
                    return $this->respond($categories,404,"Categoría no encontrada");
    
                }else{
                    return $this->respond($categories, 200, "Categoría ".$id." obtenida correctamente");
                }
    
    
            } else if ($id==null){
                $categories = $this->model->findCategories();
                
                return $this->respond($categories,200,"Categorías obtenidas correctamente");
            }
        }catch(\Exception $e){
            return $this->respond($e->getMessage(),500,"Error del servidor");
        }
        
    }
    public function categoriesDeleteRest() {
        try{
            $request=$this->request;
            $body=$request->getJSON();
            $id=$body->id;
            if (strcmp($id,"")!==0){
                $categories = $this->model->findCategories($id);
                if ($categories == null){
                    return $this->respond($categories,404,"Categoría no encontrada para eliminar");
                }else{
                    $categories = $this->model->delete($id);
                    return $this->respond($categories, 200, "Categoría ".$id." eliminada correctamente");
                }
            }
        }catch(\Exception $e){
            return $this->respond($e->getMessage(),500,"Error del servidor");
        }
        
    }
    // public function categoriesDelete (){
    //     $request=$this->request;
    //     $util = new UtilLibrary();
    //     $body=$request->getJSON();
    //     $response= $util -> getResponse("OK", "Usuario encontrado", $body->id);
    //     return $response;
    //     //return $this->categoriesDeleteRest($data);
    // }
    public function categoriesUpdateRest() {
        try{
            $request=$this->request;
            $body=$request->getJSON();
            $categories = new CategoriesModel();

            if(isset($body->id)){
                $category = $this->model->findCategories($body->id);
                if ($category) {
                    $categories->save($body);
                    return $this->respond("",200,"Categoría actualizada correctamente");
                } else {
                    return $this->respond("",404,"Categoría no encontrada para actualizar");
               
                }

            } else {
                if(isset($body->name)) {
                    $data = array(
                        "name" => $body->name
                    );
                    $newCategory = new EntitiesCategories($data);
                    $categories->save($newCategory);
                    $this->respond('', 200, 'Categoria creada con exito');
                } else  {
                    $this->respond('', 404, 'Error');
                }
            }    
        }catch(\Exception $e){
            return $this->respond($e->getMessage(),500,"Error del servidor");
        }
        
    }
}
