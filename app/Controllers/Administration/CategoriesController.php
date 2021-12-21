<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
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
        header('Access-Control-Allow-Origin: *');

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
}
