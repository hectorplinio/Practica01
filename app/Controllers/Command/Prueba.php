<?php

namespace App\Controllers\Command;

use App\Controllers\BaseController;
use CodeIgniter\CLI\CLI;

class Prueba extends BaseController
{
    public function comandoUno()
    {
        CLI::write("Este es mi primer comando");
    }
    public function comandoDos()
    {
        $client = service("curlrequest");
        $response = $client->request('GET','https://pokeapi.co/api/v2/pokemon', []);
        $response->getStatusCode();
        CLI::write($response);
    }
}
