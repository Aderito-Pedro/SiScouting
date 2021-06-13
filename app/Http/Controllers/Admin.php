<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller
{
    public function perfil(){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Admin"){
                return view('admin.perfil',['user'=>$user]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }
}
