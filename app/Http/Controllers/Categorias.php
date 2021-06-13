<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Rcategoria;

class Categorias extends Controller
{
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
}
