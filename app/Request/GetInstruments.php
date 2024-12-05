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
      //  $endpoints = ['IPS', 'HSS', 'GST','CME','RBE','FLR','MPC','SEP'];
      $endpoints = ['IPS', 'HSS', 'GST','CME'];
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
// $uniqueIds = array_values(array_unique($activityIds));
     $uniqueInstruments = array_values(array_unique($instruments));
        return $uniqueInstruments;
    }

    public function captureId()
    {
        $endpoints = ['IPS', 'HSS', 'GST','CME'];
        $activityIds = []; // Aquí se almacenarán los IDs

        foreach ($endpoints as $endpoint) {
            // Obtén los datos de cada endpoint
            $data = $this->nasaApiInterface->fetchData($endpoint);
     //dd($data);
            // Itera sobre cada actividad
            foreach ($data as $item) {
                // Verifica si la clave 'activityID' existe
                if (isset($item['activityID'])) {
                    $filteredId = preg_replace('/^[^T]*T[^-]*-/', '', $item['activityID']);
                $activityIds[] = $filteredId;
                }
            }
            //dd($endpoint);
        }

        // Elimina IDs duplicados
        $uniqueIds = array_values(array_unique($activityIds));

        // Depura los resultados (puedes quitar esto en producción)
        // dd($uniqueIds);

        return $uniqueIds;
    }
}
