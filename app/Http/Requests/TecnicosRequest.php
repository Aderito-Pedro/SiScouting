<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TecnicosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'email' => 'required|unique:equipa_tecnicas',
            'contacto1' => 'required|unique:equipa_tecnicas',
            'altura' => 'required',
            'data_nascimento' => 'required',
            'id_categoria' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome esta Vazio...',
            'email.required' => 'O campo Email está Vazio...',
            'email.unique' => 'O Email informado já foi utilizado por outra pessoa...',
            'contacto1.required' => 'O primeiro campo do Contacto não pode estar Vazio...',
            'contacto1.unique' => 'O Contacto informado já foi utilizado por outra pessoa...',
            'id_categoria' => 'O campo Categoria está Vazio...',
        ];
    }
}


