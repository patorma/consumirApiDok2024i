<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityIdResource;
use App\Http\Resources\InstrumentPorcentajeResource;
use App\Http\Resources\InstrumentResource;
use App\Request\GetInstruments;
use App\Request\GetPorcentajeInstruments;
use Illuminate\Http\Request;

class NasaController extends Controller
{

    public function getIntruments(GetInstruments $getInstruments){
        $instruments = $getInstruments->execute();

        return response()->json([
            "instruments" =>InstrumentResource::collection($instruments)
        ]);


    }

    public function getActivityId(GetInstruments $getActivityId){
        $activityIds = $getActivityId->captureId();

        return response()->json([
           "activityIDs" => ActivityIdResource::collection($activityIds)
        ]);
    }

    public function getInstrumentoPorcentaje(GetPorcentajeInstruments $getPorcentajeInstruments){
        $usage = $getPorcentajeInstruments->execute();


     $mappedUsage = collect($usage)->map(function ($percentage, $instrument) {
        return [
            'instrument' => $instrument,
            'porcentaje' => $percentage,
        ];
    })->values();

    return response()->json([
        'instruments_use' => InstrumentPorcentajeResource::collection($mappedUsage),
    ]);
    }


}
