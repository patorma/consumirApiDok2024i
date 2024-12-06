<?php

namespace App\Request;


use App\Bussines\LlamarApi;

class GetInstruments{


    private LlamarApi $llamada;
    public function __construct(LlamarApi $llamada){
       $this->llamada = $llamada;
    }

    public function execute(): array
    {

      $endpoints = ['IPS', 'HSS', 'GST','CME'];

      $elements = $this->llamada->obtenerEndpoints($endpoints,function($item,&$results){
        if (isset($item['instruments'])){
            foreach ($item['instruments'] as $instrument) {
                $results[] = $instrument['displayName'];
            }
        }
      });
      return $elements;



    }

    public function captureId()
    {
        $endpoints = ['IPS', 'HSS', 'GST','CME'];

        $elements =$this->llamada->obtenerEndpoints($endpoints,function($item, &$results){
            if (isset($item['activityID'])) {
                $filteredId = preg_replace('/^[^T]*T[^-]*-/', '', $item['activityID']);
                $results[] = $filteredId;
            }
        });
        return $elements;

    }
}
