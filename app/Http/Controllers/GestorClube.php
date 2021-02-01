<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;
use App\Models\Municipio;
use App\Models\Provincia;
use App\Models\Telefone;
use Exception;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request){

        try {
            DB::beginTransaction();
            $user = auth()->user();
            $clube = new Clube;
            $clube->clube = $request->clube;
            $clube->email = $request->email;
            $clube->escalao = $request->escalao;
            $clube->fundador = $request->fundador;
            $clube->data_fundacao = $request->data_fundacao;
            $clube->estadio = $request->estadio;
            $clube->id_municipio = $request->municipio;
            $clube->id_user = $user->id;

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $requestImage = $request->image;
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $requestImage->move(public_path('img/siscout'),$imageName);
                $clube->emblema = $imageName;
            }

            $clube->save();

            $telefone = new Telefone();
            $telefone->numero = $request->telefone;
            $telefone->id_clube = $clube->id;
            $telefone->save();

            DB::commit();

            return view('gestor/home',['user'=>$user]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }

    }

    public function listClube(){
        $user = auth()->user();
        $club = Clube::where([['id_user',$user->id]])->first();
        $municipio = Municipio::where([['id',$club->id_municipio]])->first();
        $provincia = Provincia::where([['id',$municipio->provincia_id]])->first();
        $endereco = $provincia->nome.', '.$municipio->nome;
        $telefone =Telefone::where([['id_clube',$club->id]])->get();
        $dadosClube = [
            'user'=>$user,
            'clube' => $club,
            'telefones'=>$telefone,
            'endereco'=>$endereco,
        ];
        return view('gestor/listClube',$dadosClube);
    }
}
