<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestorClube extends Controller
{


    public function addClube(){
        $user = auth()->user();
        return view('gestor/addClube',['user'=>$user]);
    }

    public function addTecnico(){
        $user = auth()->user();
        return view('gestor/addTecnico',['user'=>$user]);
    }
}
