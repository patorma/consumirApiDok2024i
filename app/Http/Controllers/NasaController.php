<?php

namespace App\Http\Controllers;

use App\Http\Resources\ElementResource;
use App\Request\GetInstruments;
use App\Request\GetPorcentajeInstruments;
use Illuminate\Http\Request;

class NasaController extends Controller
{

    public function getIntruments(GetInstruments $getInstruments){
        $instruments = $getInstruments->execute();
// dd($instruments);
        return response()->json([
            "instruments" =>$instruments
        ]);

        // return new ElementResource($instruments);
    }

    public function getActivityId(GetInstruments $getActivityId){
        $activityIds = $getActivityId->captureId();
       // dd($activityIds);
        return response()->json([
           "activityIDs" => $activityIds
        ]);
    }

    public function getInstrumentoPorcentaje(GetPorcentajeInstruments $getPorcentajeInstruments){
        $usage = $getPorcentajeInstruments->execute();

        return response()->json(['instruments_use' => $usage]);
    }
}
