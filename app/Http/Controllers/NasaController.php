<?php

namespace App\Http\Controllers;

use App\Request\GetInstruments;
use Illuminate\Http\Request;

class NasaController extends Controller
{
    public function getIntruments(GetInstruments $getInstruments){
       return response()->json($getInstruments->execute());
    }
}
