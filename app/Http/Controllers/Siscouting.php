<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Siscouting extends Controller
{
    public function login(){
        return view('login');
    }

    public function store(Request $request){
        $user = new User;

        $user->name = $request->nome.' '.$request->sobnome;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->tipo = $request->tipo;

        /*if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request->image->move(public_path('img/!!!'),$imageName);
            $user->img = $imageName;
        }*/
        $user->save();

        return redirect('/home');
    }
}
