<?php

namespace App\Request;

use App\Bussines\Interface\NasaApiInterface;

class GetPorcentajeInstruments{


    private NasaApiInterface $nasaApiInterface;

    public function __construct(NasaApiInterface $nasaApiInterface){
        $this->nasaApiInterface =$nasaApiInterface;
     }

     public function execute(): array{
        $endpoints = ['IPS', 'HSS', 'GST','CME'];
        $instrumentCounts = [];
        $totalInstruments = 0;
        foreach ($endpoints as $endpoint) {
            $data = $this->nasaApiInterface->fetchData($endpoint);
            foreach ($data as $item) {
            if (isset($item['instruments'])) {
                foreach ($item['instruments'] as $instrument){
                    $name = $instrument['displayName'] ?? null;
                    if ($name) {
                        // Incrementa el contador del instrumento
                        $instrumentCounts[$name] = ($instrumentCounts[$name] ?? 0) + 1;
                        $totalInstruments++; // Incrementa el total general
                    }
                }
            }
        }
        }
        $instrumentUsage = [];
        foreach ($instrumentCounts as $instrument => $count) {
            $instrumentUsage[$instrument] = round($count / $totalInstruments, 1);
        }
//dd($instrumentUsage);
        return $instrumentUsage;
     }
}
