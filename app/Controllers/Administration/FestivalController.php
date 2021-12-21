<?php

namespace App\Controllers\Administration;

use App\Controllers\BaseController;
use App\Models\FestivalsModel;

class FestivalController extends BaseController
{
    public function home (){
        $data = array(
            "title" => "Listado de festivals",
        );
        return view ("Administration/festivals", $data);
    }
    public function getFestivalsData() {
        header('Access-Control-Allow-Origin: *');

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
}
