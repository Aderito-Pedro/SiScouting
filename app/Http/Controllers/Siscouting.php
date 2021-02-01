<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clube;
use App\Models\Provincia;
use App\Models\Municipio;

class Siscouting extends Controller
{
    public function login(){
        return view('login');
    }

    public function stogin(Request $request){
        $dados = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($dados)) {
            $use = auth()->user();
            return view('gestor/home',['user'=>$use]);
        }
        //return redirect()->back();
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect(route('sis.home'));
    }

    public function store(Request $request){
        $user = new User;

        $user->name = $request->nome.' '.$request->sobnome;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->tipo = $request->tipo;

        $user->save();
        $use = auth()->user();
        return redirect('/dashboard',['user'=>$use]);
    }

    public function home(){
        $user = auth()->user();
        if($user->tipo == "Gestor"){
            $cont = Clube::where('id_user',$user->id)->count();
            if ($cont == 0) {
                $provincias = Provincia::all();
                $municipios = Municipio::all();
                return view('gestor/addClube',['pro'=>$provincias,'municipios'=>$municipios]);
            }elseif($cont >0){
                return view('gestor/home',['user'=>$user]);
            }
        }elseif($user->tipo == "Comissario"){

            echo "AINDA NÃO EXISTE DASHBOARD";
        }
    }
}
