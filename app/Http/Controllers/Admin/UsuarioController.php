<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seguridad\Usuario;
use App\Models\Admin\Rol;
use App\Http\Requests\ValidacionUsuario;
use App\Models\Personal;

class UsuarioController extends Controller
{
    /**
     * Mostrar un listado de usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-usuarios');
        $datas = Usuario::with('roles:id,nombre','personal')
                    ->where('id', '!=', 1)
                    ->orderBy('id')->get();
                    
        return view('admin.usuario.index', compact('datas'));
    }

    /**
     * Muestra el formulario para añadir un usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('añadir-usuarios');
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        return view('admin.usuario.crear', compact('rols'));
    }

    /**
     * Añade un nuevo usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionUsuario $request)
    {
        can('añadir-usuarios');
        $usuario = Usuario::create($request->all());
        $usuario->roles()->sync($request->rol_id);
        return redirect('admin/usuario')->with('mensaje', 'Usuario creado con exito');
    }

    /**
     * Muestra el formulario para editar un usuario.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        can('ver-usuarios');
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        $data = Usuario::with('roles')->findOrFail($id);
        
        if (!can('modificar-usuarios',false)) {
            $data->only_view=1;
            $data->roles->only_view=1;
        }

        return view('admin.usuario.editar', compact('data', 'rols'));
    }

    /**
     * Actualiza un usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionUsuario $request, $id)
    {
        can('modificar-usuarios');
        $usuario = Usuario::findOrFail($id);
        $usuario->update(array_filter($request->all()));
        $usuario->roles()->sync($request->rol_id);

        if(!$request->activo){
            $usuario->update(array('activo' => 0));
        }

        return redirect('admin/usuario')->with('mensaje', 'Usuario actualizado con exito');
    
    }

    /**
     * Elimina un usuario.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        can('eliminar-usuarios');
        if ($request->ajax()) {
            $usuario = Usuario::findOrFail($id);
            $usuario->roles()->detach();
            $usuario->delete(); //trashed() //SoftDeletes
            return response()->json(['mensaje' => 'ok']);
         } else {
            abort(404);
        }
    }

    /**
     * Función que devuelve el html necesario para crear un SELECT en la vista, esta se utilizara mediante AJAX.
     * 
     * @return \Illuminate\Http\Response
     */
    public function obtener_usuario()
    {
        $html = '<option value="">Seleccionar Personal</option>';
        $personal = Personal::with('usuario')->where('id', '!=', 1)->whereHas('usuario', function ($query) {
            $query->where('activo', '=', 1);
        })->get()->pluck('full_name', 'usuario.id')
                    ->toArray();
        foreach ($personal as $key => $ficha) {
            $html .= '<option value="'.$key.'">'.$ficha.'</option>';
        }
        return $html;
    }
}
