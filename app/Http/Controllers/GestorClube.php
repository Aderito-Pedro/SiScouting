<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;
use App\Models\Municipio;
use App\Models\Provincia;
use App\Models\Telefone;
use App\Models\Categoria;
use App\Models\Rcategoria;
use App\Models\Responsavel;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GestorClube extends Controller
{

    public function getProvinciaAll(){
        $provincias = Provincia::all();
        echo '<option></option>';
        foreach ($provincias as $provincia){
            echo '<option value="'.$provincia->id.'">'.$provincia->nome.'</option>';
        }
    }

    public function getMunicipioAll($id){
        $municipios = Municipio::where([['provincia_id','=',$id]])->get();
        echo '<option></option>';
        foreach ($municipios as $municipio){
            echo '<option value="'.$municipio->id.'">'.$municipio->nome.'</option>';
        }
    }

    public function getCategoriaAll(){
        $categorias = Categoria::all();
        echo '<option></option>';
        foreach ($categorias as $categoria){
            echo '<option value="'.$categoria->id.'">'.$categoria->descricao.'</option>';
        }
    }

    public function getRcategoriaAll(){
        $rcategorias = Rcategoria::all();
        echo '<option></option>';
        foreach ($rcategorias as $rcategoria){
            echo '<option value="'.$rcategoria->id.'">'.$rcategoria->descricao.'</option>';
        }
    }

    public function addClube(){
        if(Auth::check() === true){
            $user = auth()->user();
            return view('gestor/addClube',['user'=>$user]);
        }else{
            return redirect(route('login'));
        }
    }

    public function addTecnico(){
        if(Auth::check() === true){
            $user = auth()->user();
            return view('gestor/addTecnico',['user'=>$user]);
        }else{
            return redirect(route('login'));
        }
    }

    public function addResponsavel(){
        if(Auth::check() === true){
            $user = auth()->user();
            return view('gestor/addResponsavel',['user'=>$user]);
        }else{
            return redirect(route('login'));
        }
    }

    public function store(Request $request){
        if (Auth::check() === true) {
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
                $clube->id_municipio = $request->val_municipio;
                $clube->id_user = $user->id;
                //var_dump($request->file('image'));
                if ($request->hasFile('image') && $request->file('image')->isValid()) {
                    //dd($request->image);
                    $requestImage = $request->image;
                    $extension = $requestImage->extension();
                    $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
                    $requestImage->move(public_path('/img/siscout/clube'),$imageName);
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
        }else{
            return redirect(route('login'));
        }
    }

    public function listClube(){
        if(Auth::check() === true){
            $user = auth()->user();
            $cont = Clube::where([['id_user',$user->id]])->count();
            if($cont > 0){
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
            }else{
                echo "teste";
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function stoResponsavel(Request $request){
        if (Auth::check() === true) {
            try {
                $user = auth()->user();
                $club = Clube::where([['id_user',$user->id]])->first();
                $responsavel = new Responsavel();
                $responsavel->nome = $request->nome;
                $responsavel->email = $request->email;
                $responsavel->numero = $request->numero;
                $responsavel->id_rcategoria = $request->val_categoria;
                $responsavel->id_clube = $club->id;
                $responsavel->save();
                return view('gestor/home',['user'=>$user]);
            } catch (Exception $e) {
                return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
            }
        }else{
            return redirect(route('login'));
        }
    }
}
