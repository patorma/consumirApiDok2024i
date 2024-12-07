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

            // Itera sobre cada actividad
            foreach ($data as $item) {
                if (isset($item['instruments'])) {
                    foreach ($item['instruments'] as $instrument) {
                        // Extrae el nombre del instrumento
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

        // Calcula los porcentajes
        $instrumentUsage = [];
        foreach ($instrumentCounts as $instrument => $count) {
            $instrumentUsage[$instrument] =round($count / $totalInstruments,2);
        }

        return $instrumentUsage;
    }

}
