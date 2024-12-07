<?php

namespace App\Request;

use App\Bussines\Interface\NasaApiInterface;
use App\Bussines\LlamarApi;

class GetPorcentajeInstruments{


    private NasaApiInterface $nasaApiInterface;
    private LlamarApi $llamada;
    public function __construct(NasaApiInterface $nasaApiInterface,LlamarApi $llamada){
        $this->nasaApiInterface =$nasaApiInterface;
        $this->llamada = $llamada;
     }

     public function execute(): array{
        $endpoints = ['IPS', 'HSS', 'GST','CME'];

        $elements = $this->llamada->obtenerEndpoints($endpoints,function($item,&$results){
            if (isset($item['instruments'])){
                $instrumentCounts = [];
        $totalInstruments = 0;
                foreach ($item['instruments'] as $instrument){
                    $name = $instrument['displayName'] ?? null;
                    if ($name) {
                        // Incrementa el contador del instrumento
                        $instrumentCounts[$name] = ($instrumentCounts[$name] ?? 0) + 1;
                        $totalInstruments++; // Incrementa el total general
                    }
                }
            }

           // $instrumentUsage = [];
            foreach ($instrumentCounts as $instrument => $count) {
                $results[$instrument] = round($count / $totalInstruments, 1);
            }
        });

        return $elements;



    }
}
