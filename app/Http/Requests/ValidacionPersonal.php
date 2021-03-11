<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Personal;

class ValidacionPersonal extends ValidacionUsuario
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

        if ($this->route('id')) {
            $personal = Personal::with('usuario')->findOrFail($this->route('id'));

            return [
                'nombre' => 'required|max:50',
                'apellidos' => 'required|max:100',
                'dni' => 'max:20',
                'subir_dni' => 'nullable|mimes:pdf,jpeg,png,gif|max:10000',
                'foto.*' => 'nullable|image|max:10000',
                'sexo' => 'max:20',
                'telefono' => 'max:50',
                'email_empresa' => 'required|email|max:100',
                'direccion' => 'max:200',
                
                'email' => 'required|email|max:100|unique:usuario,email,' . $personal->usuario->id,
                'password' => 'nullable|min:5',
                're_password' => 'nullable|required_with:password|min:5|same:password',
                //'rol_id' => 'required|array',
                //'rol_id.0' => 'required'
            ];
        } else {
            return [
                'nombre' => 'required|max:50',
                'apellidos' => 'required|max:100',
                'dni' => 'max:20',
                'subir_dni' => 'nullable|mimes:pdf,jpeg,png,gif|max:10000',
                'foto.*' => 'nullable|image|max:10000',
                'sexo' => 'max:20',
                'telefono' => 'max:50',
                'email_empresa' => 'required|email|max:100',
                'direccion' => 'max:200',
                
                'email' => 'required|email|max:100|unique:usuario,email',
                'password' => 'nullable|min:5',
                're_password' => 'nullable|required_with:password|min:5|same:password',
                'rol_id' => 'required|array',
                'rol_id.0' => 'required'
            ];
        }
    }
}
