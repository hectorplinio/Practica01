<?php

namespace App\Controllers\Command;

use App\Controllers\BaseController;
use CodeIgniter\CLI\CLI;
use SimpleXMLElement;

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
        // $response->getStatusCode();
        // $body=$response->getBody();
        // $body =json_decode($body);
        // CLI::write($body[]);
    }
    public function pokemon()
    {
        /* Endpoint */
        $url = 'https://pokeapi.co/api/v2/pokemon';
    
        /* eCurl */
        $curl = curl_init($url);
             
        /* Define content type */
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
             
        /* Return json */
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
             
        /* make request */
        $result = curl_exec($curl);
        

        $result = json_decode($result, true);
        $x =0;
        CLI::write("---- INICIO obtener pokemons ----");
        CLI::write("Realizando petición ...");
        CLI::write("Peticion realizada correctamente");
        CLI::write("Pokemons obtenidos:");
        $result = $result['results'];
        for ($i = 0;$i < count($result) ; $i ++ ){
            $x = $x+1;
            $results = $result[$i]['name'];
            CLI::write( $x." ".$results);
        }
        //$results = $result->results[0]->name;

        //CLI::write($results);
        //php /Applications/MAMP/htdocs/Codeigniter/Practica01/public/index.php /commands/pokemons
              
        /* close curl */
        curl_close($curl);
    
    }
    public function villena(){
        $arrContextOptions=array(
            "ssl" => array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );
        $response = file_get_contents("https://www.villena.es/feed", false, stream_context_create($arrContextOptions));
        $data = new SimpleXMLElement($response);
        //Asi se imprime el objeto con todo lo que tiene dentro
        //CLI::write($response);
        $items = $data->channel->item;
        $x=0;
        foreach($items as $item){
            $x=$x+1;
            CLI::write($x." - ".$item->title);
        }
    }

}
