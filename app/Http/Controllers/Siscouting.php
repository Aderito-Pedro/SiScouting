<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clube;
use App\Models\Equipa;

class Siscouting extends Controller
{
    public function login(){
        if (Auth::check()== true) {
            return redirect(route('sis.home'));
        }else{
            return view('login');
        }
    }

    public function stogin(Request $request){
        $dados = [
            'email' => filter_var($request->email,FILTER_SANITIZE_EMAIL),
            'password' => $request->password,
        ];
        if (Auth::attempt($dados)) {
            return redirect(route('sis.home'));
        }else{
            return redirect()->back()->with('msg','Credencias Invalidas...');
        }
    }

    public function logout(){
        if(Auth::check() === true){
            Auth::logout();
            Session::flush();
            return redirect(route('sis.home'));
        }else{
            return redirect(route('login'));
        }
    }

    public function store(Request $request){
        $user = new User;
        $user->name = filter_var($request->nome.' '.$request->sobnome,FILTER_SANITIZE_STRING);
        $user->email = filter_var($request->email,FILTER_SANITIZE_EMAIL);
        $user->password = bcrypt($request->password);
        $user->tipo = filter_var($request->tipo,FILTER_SANITIZE_STRING);

        $user->save();
        $dados = [
            'email' => filter_var($request->email,FILTER_SANITIZE_EMAIL),
            'password' => $request->password,
        ];
        Auth::attempt($dados);
        return redirect(route('sis.home'));
    }

    public function home(){
        if(Auth::check() === true){
            $user = auth()->user();
            if($user->tipo === "Gestor"){
                $cont = Clube::where('id_user',$user->id)->count();
                if ($cont === 0) {
                    return redirect(route('gest.addClube'));
                }elseif($cont > 0){
                    $club = Clube::where([['id_user',$user->id]])->first();
                    $equipa = Equipa::where([['id_clube',$club->id]])->first();
                    $tecnicos = DB::table('equipa_tecnicas')
                    ->where([['equipa_tecnicas.id_equipa',$equipa->id]])
                    ->join('categorias','equipa_tecnicas.id_categoria','=','categorias.id')
                    ->select('equipa_tecnicas.*', DB::raw('categorias.descricao as categoria'))
                    ->count();
                    $jogadores = DB::table('jogadors')
                    ->join('equipa_jogadors','jogadors.id','=','equipa_jogadors.id_jogador')
                    ->where([['equipa_jogadors.id_equipa',$equipa->id]])
                    ->select('jogadors.*')
                    ->count();
                    $dados = [
                        'user'=>$user,
                        'qtdTecnico' => $tecnicos,
                        'qtdJogador' => $jogadores,
                    ];
                    return view('gestor.home',$dados);
                }
            }elseif($user->tipo === "Comissario"){
                $dados = [
                    'user' => $user,
                ];
                return view('comissario.home',$dados);
            }elseif($user->tipo === "Admin"){
                $dados = [
                    'user' => $user,
                ];
                return view('admin.home',$dados);
            }
        }else{
            return redirect(route('login'));
        }
    }
}
