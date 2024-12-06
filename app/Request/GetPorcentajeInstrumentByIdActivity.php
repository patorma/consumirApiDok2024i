<?php

namespace App\Request;

use App\Bussines\Interface\NasaApiInterface;

class GetPorcentajeInstrumentByIdActivity{
    private NasaApiInterface $nasaApiInterface;

    public function __construct(NasaApiInterface $nasaApiInterface){
        $this->nasaApiInterface =$nasaApiInterface;
     }


}
