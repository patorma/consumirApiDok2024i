<?php

namespace App\Request;

use App\Bussines\Interface\NasaApiInterface;

class GetInstruments{

    private NasaApiInterface $nasaApiInterface;

    public function __construct(NasaApiInterface $nasaApiInterface){
       $this->nasaApiInterface =$nasaApiInterface;
    }

    public function execute(): array
    {
        $endpoints = ['IPS', 'HSS', 'GST']; // Rutas de DONKI
        $instruments = [];

        foreach ($endpoints as $endpoint) {
            $data = $this->nasaApiInterface->fetchData($endpoint);

            foreach ($data as $item) {
                if (isset($item['instruments'])) {
                    foreach ($item['instruments'] as $instrument) {
                        $instruments[] = $instrument['displayName'];
                    }
                }
            }
        }

        return array_unique($instruments);
    }
}
