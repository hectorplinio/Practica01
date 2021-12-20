<?php

namespace App\Controllers\Rest;

use CodeIgniter\RESTful\ResourceController;
class PruebaRestController extends ResourceController
{
    protected $modelName = 'App\Models\CategoriesModel';
    protected $format = "json"; 
    //respond($data = null, ?int $status = null, string $message = "");

    public function pruebaRest()
    {
    }
}
