<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionProvincia;
use App\Models\Admin\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    /**
     * Mostrar un listado de provincias.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-parametros');
        $datas = Provincia::orderBy('id')->get();
        return view('admin.provincia.index', compact('datas'));
    }

    /**
     * Muestra el formulario para añadir una provincia.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {   
        can('añadir-parametros');
        return view('admin.provincia.crear');
    }

    /**
     * Añade un nueva provincia.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionProvincia $request)
    {
        can('añadir-parametros');
        Provincia::create($request->all());
        return redirect('admin/provincia')->with('mensaje', 'Provincia creada con exito');
    }


    /**
     * Muestra el formulario para editar una provincia.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        can('ver-parametros');
        $data = Provincia::findOrFail($id);

        if (!can('modificar-parametros',false)) {
            $data->only_view=1;
        }
        return view('admin.provincia.editar', compact('data'));
    }

    /**
     * Actualiza una provincia.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionProvincia $request, $id)
    {
        can('modificar-parametros');
        Provincia::findOrFail($id)->update($request->all());
        return redirect('admin/provincia')->with('mensaje', 'Provincia actualizada con exito');
    }

    /**
     * Elimina un país.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        can('eliminar-parametros');
        if ($request->ajax()) {
            if (Provincia::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
