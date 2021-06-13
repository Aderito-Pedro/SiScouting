<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Jogo extends Controller
{
    public function newJogo(){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Admin"){
                return view('admin.newJogo',['user'=>$user]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function gerarCalendario(Request $request){
        if (Auth::check() === true) {
            $user = auth()->user();
            if($user->tipo === "Admin"){
                echo "Ola Mundo";
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }
}
