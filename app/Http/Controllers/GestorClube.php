<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestorClube extends Controller
{
    public function home(){

        return view('gestor/home');
    }
}
