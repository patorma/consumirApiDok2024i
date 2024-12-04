<?php

namespace App\Http\Controllers;

use App\Request\GetInstruments;
use Illuminate\Http\Request;

class NasaController extends Controller
{

    public function getIntruments(GetInstruments $getInstruments){
        $instruments = $getInstruments->execute();
        return response()->json([
            "instruments" =>$instruments
        ]);
    }
}
