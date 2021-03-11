<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionEmpresa extends FormRequest
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
            'cif' => 'max:20',
            'denominacion' => 'required|max:200',
            'nombre_comercial' => 'required|max:200',
            'logo.*' => 'nullable|image|max:10000',
            'telefono' => 'max:50',
            'email' => 'required|email|max:100',
            'direccion' => 'max:200'
        ];
    }
}
