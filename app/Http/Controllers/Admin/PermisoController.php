<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Permiso;
use App\Http\Requests\ValidarPermiso;

class PermisoController extends Controller
{
    /**
     * Mostrar un listado de permisos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-permisos');
        $permisos = Permiso::orderBy('id')->get();
        return view('admin.permiso.index', compact('permisos'));
    }

    /**
     * Muestra el formulario para crear un permiso.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('añadir-permisos');
        return view('admin.permiso.crear');
    }

    /**
     * Añade un nuevo permiso.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarPermiso $request)
    {
        can('añadir-permisos');
        Permiso::create($request->all());
        return redirect('admin/permiso/crear')->with('mensaje', 'Permiso creado con exito');
    }

    /**
     * Muestra el formulario para editar un permiso.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        can('ver-permisos');
        $data = Permiso::findOrFail($id);

        if (!can('modificar-permisos',false)) {
            $data->only_view=1;
        }

        return view('admin.permiso.editar', compact('data'));
    }

    /**
     * Actualiza un permiso.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarPermiso $request, $id)
    {
        can('modificar-permisos');
        Permiso::findOrFail($id)->update($request->all());
        return redirect('admin/permiso')->with('mensaje', 'Permiso actualizado con exito');
    }

    /**
     * Elimina un permiso
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        can('eliminar-permisos');
        if ($request->ajax()) {
            if (Permiso::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
