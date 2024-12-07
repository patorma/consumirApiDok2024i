<?php

namespace App\Request;

use App\Bussines\Interface\NasaApiInterface;
use App\Bussines\LlamarApi;

class GetPorcentajeInstruments{
    private NasaApiInterface $repository;

    public function __construct(NasaApiInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): array
    {
        $endpoints = ['IPS', 'HSS', 'GST', 'CME'];
        $instrumentCounts = [];
        $totalInstruments = 0;

        foreach ($endpoints as $endpoint) {
            // Obtén los datos del endpoint
            $data = $this->repository->fetchData($endpoint);


            foreach ($data as $item) {
                if (isset($item['instruments'])) {
                    foreach ($item['instruments'] as $instrument) {

                        $name = $instrument['displayName'] ?? null;
                        if ($name) {

                            $instrumentCounts[$name] = ($instrumentCounts[$name] ?? 0) + 1;
                            $totalInstruments++; // Incrementa el total general
                        }
                    }
                }
            }
        }


        $instrumentUsage = [];
        foreach ($instrumentCounts as $instrument => $count) {

            $instrumentUsage[$instrument] =round($count / $totalInstruments,2);
        }

        return $instrumentUsage;
    }

}
