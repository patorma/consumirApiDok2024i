<?php

namespace App\Http\Controllers;


use App\Request\GetInstruments;
use App\Request\GetPorcentajeInstruments;
use Illuminate\Http\Request;

class NasaController extends Controller
{

    public function getIntruments(GetInstruments $getInstruments){
        $instruments = $getInstruments->execute();

        return response()->json([
            "instruments" =>$instruments
        ]);


    }

    public function getActivityId(GetInstruments $getActivityId){
        $activityIds = $getActivityId->captureId();

        return response()->json([
           "activityIDs" => $activityIds
        ]);
    }

    public function getInstrumentoPorcentaje(GetPorcentajeInstruments $getPorcentajeInstruments){
        $usage = $getPorcentajeInstruments->execute();

        return response()->json(['instruments_use' => $usage]);
    }

    // public function getInstrumentoPorcentajeById(Request $request,   GetInstruments $getInstrument){

    //     $validated = $request->validate([
    //         'instrument' => 'required|string',
    //     ]);
    //     $instrumentName = $validated['instrument'];

    //     // Ejecuta el caso de uso para calcular el porcentaje
    //     $percentage = $getInstrument->pruebaCaprureId($instrumentName);
    //     return response()->json([
    //         'instrument' => $instrumentName,
    //         'percentage' => round($percentage, 4), // Redondear a 4 decimales
    //     ]);
    // }
}
