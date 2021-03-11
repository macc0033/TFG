<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionRol;
use App\Models\Admin\Rol;


class RolController extends Controller
{
    /**
     * Mostrar un listado de roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-roles');
        $datas = Rol::orderBy('id')->get();
        return view('admin.rol.index', compact('datas'));
    }

    /**
     * Muestra el formulario para añadir un rol.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {   
        can('añadir-roles');
        return view('admin.rol.crear');
    }

    /**
     * Añade un nuevo rol.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionRol $request)
    {
        can('añadir-roles');
        Rol::create($request->all());
        return redirect('admin/rol')->with('mensaje', 'Rol creado con exito');
    }


    /**
     * Muestra el formulario para editar un rol.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        can('ver-roles');
        $data = Rol::findOrFail($id);

        if (!can('modificar-roles',false)) {
            $data->only_view=1;
        }
        return view('admin.rol.editar', compact('data'));
    }

    /**
     * Actualiza un rol.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionRol $request, $id)
    {
        can('modificar-roles');
        Rol::findOrFail($id)->update($request->all());
        return redirect('admin/rol')->with('mensaje', 'Rol actualizado con exito');
    }

    /**
     * Elimina un rol.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        can('eliminar-roles');
        if ($request->ajax()) {
            if (Rol::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
