<?php
namespace App\Bussines;

use App\Bussines\Interface\NasaApiInterface;

class LlamarApi{


    private NasaApiInterface $nasaApiInterface;

    public function __construct(NasaApiInterface $nasaApiInterface){
       $this->nasaApiInterface =$nasaApiInterface;
    }

    public function obtenerEndpoints(array $endpoints, callable $callback):array{
        $results=[];

       foreach ($endpoints as $endpoint) {
           $data = $this->nasaApiInterface->fetchData($endpoint);

           foreach ($data as $item) {
               $callback($item, $results);
           }
       }

       return array_values(array_unique($results));
   }

}
