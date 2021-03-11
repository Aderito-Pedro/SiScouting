<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResponsavelRequest extends FormRequest
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
            'email' => 'required|unique:responsavels',
            'numero1' => 'required|unique:responsavels',
            'id_rcategoria' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome está Vazio...',
            'email.required' => 'O campo Email está Vazio...',
            'email.unique' => 'O Email informado já foi utilizado por outra pessoa...',
            'numero1.required' => 'O primeiro campo do Contacto não pode estar Vazio...',
            'numero1.unique' => 'O Contacto informado já foi utilizado por outra pessoa...',
            'id_rcategoria' => 'O campo Categoria está Vazio...',
        ];
    }
}
