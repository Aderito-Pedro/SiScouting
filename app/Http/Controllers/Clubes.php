<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Clube;
use App\Models\Municipio;
use App\Models\Provincia;
use App\Models\Equipa;
use App\Models\Pais;
use Exception;

class Clubes extends Controller
{

    public function addClube(){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                return view('gestor/addClube',['user'=>$user]);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function store(Request $request){
        if (Auth::check() === true) {
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                try {
                    DB::beginTransaction();
                    $clube = new Clube;
                    $clube->clube = filter_var($request->clube,FILTER_SANITIZE_STRING);
                    $clube->email = filter_var($request->email,FILTER_SANITIZE_EMAIL);
                    $clube->escalao = filter_var($request->escalao,FILTER_SANITIZE_SPECIAL_CHARS);
                    $clube->fundador = filter_var($request->fundador,FILTER_SANITIZE_STRING);
                    $clube->data_fundacao = filter_var($request->data_fundacao,FILTER_SANITIZE_SPECIAL_CHARS);
                    $clube->estadio = filter_var($request->estadio,FILTER_SANITIZE_SPECIAL_CHARS);
                    $clube->id_municipio = filter_var($request->val_municipio,);
                    $clube->telefone1 = filter_var($request->telefone1,FILTER_SANITIZE_STRING);
                    $clube->telefone2 = filter_var($request->telefone2,FILTER_SANITIZE_STRING);
                    $clube->id_user = filter_var($user->id,FILTER_SANITIZE_NUMBER_INT);
                    if ($request->hasFile('image') && $request->file('image')->isValid()) {
                        $requestImage = $request->image;
                        $extension = $requestImage->extension();
                        $imageName = md5($requestImage.strtotime("now")) . "." . $extension;
                        $requestImage->move(public_path('img/siscout/clube'),$imageName);
                        $clube->emblema = $imageName;
                    }

                    $clube->save();

                    $equipa = new Equipa();
                    $equipa->id_clube = filter_var($clube->id,FILTER_SANITIZE_NUMBER_INT);
                    $equipa->save();
                    DB::commit();

                    return redirect(route('sis.home'));
                } catch (Exception $e) {
                    DB::rollBack();
                    return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
                }
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function listClube(){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                $cont = Clube::where([['id_user',$user->id]])->count();
                if($cont > 0){
                    $club = Clube::where([['id_user',$user->id]])->first();
                    $municipio = Municipio::where([['id',$club->id_municipio]])->first();
                    $provincia = Provincia::where([['id',$municipio->provincia_id]])->first();
                    $endereco = $provincia->nome.', '.$municipio->nome;
                    $responsavel = DB::table('responsavels')
                        ->join('clubes','responsavels.id_clube','=','clubes.id')
                        ->where([['clubes.id',$club->id]])
                        ->join('rcategorias','responsavels.id_rcategoria','=','rcategorias.id')
                        ->select('responsavels.*', DB::raw('rcategorias.descricao as categoria'))
                        ->get();
                    $equipa = Equipa::where([['id_clube',$club->id]])->first();
                    $competicao = DB::table('competicaos')
                        ->join('objectivos','competicaos.id','=','objectivos.id_competicao')
                        ->where([['objectivos.id_equipa',$equipa->id]])
                        ->select('competicaos.*', DB::raw('objectivos.objectivo as objectivo'))
                        ->get();
                    $tecnicos = DB::table('equipa_tecnicas')
                        ->where([['equipa_tecnicas.id_equipa',$equipa->id]])
                        ->join('categorias','equipa_tecnicas.id_categoria','=','categorias.id')
                        ->select('equipa_tecnicas.*', DB::raw('categorias.descricao as categoria'))
                        ->get();
                    $dadosClube = [
                        'user'=>$user,
                        'clube' => $club,
                        'endereco'=>$endereco,
                        'responsavels' => $responsavel,
                        'tecnicos' => $tecnicos,
                        'competicoes' => $competicao,
                    ];
                    return view('gestor/listClube',$dadosClube);
                }else{
                    return redirect(route('sis.home'));
                }
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function clubeAll(){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Admin"){
                $club = Clube::All();
                $dadosClube = [
                    'user'=>$user,
                    'clubes' => $club,
                ];
                return view('admin.listEquipa',$dadosClube);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

    public function clubeOne($id){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Admin"){
                $club = Clube::where([['id',$id]])->first();
                $municipio = Municipio::where([['id',$club->id_municipio]])->first();
                $provincia = Provincia::where([['id',$municipio->provincia_id]])->first();
                $pais = Pais::where([['id',$provincia->id_pais]])->first();
                $endereco = $pais->descricao.' / '.$provincia->nome.' / '.$municipio->nome;
                $dadosClube = [
                    'user'=>$user,
                    'clube' => $club,
                    'endereco' => $endereco,
                ];
                return view('admin.clube',$dadosClube);
            }else{
                return redirect('/');
            }
        }else{
            return redirect(route('login'));
        }
    }

}
