<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionPais;
use App\Models\Admin\Paises;
use Illuminate\Http\Request;

class PaisesController extends Controller
{
    /**
     * Mostrar un listado de paises.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-parametros');
        $datas = Paises::orderBy('id')->get();
        return view('admin.pais.index', compact('datas'));
    }

    /**
     * Muestra el formulario para añadir un país.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {   
        can('añadir-parametros');
        return view('admin.pais.crear');
    }

    /**
     * Añade un nuevo país.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionPais $request)
    {
        can('añadir-parametros');
        Paises::create($request->all());
        return redirect('admin/pais')->with('mensaje', 'País creado con exito');
    }


    /**
     * Muestra el formulario para editar un país.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        can('ver-parametros');
        $data = Paises::findOrFail($id);

        if (!can('modificar-parametros',false)) {
            $data->only_view=1;
        }
        return view('admin.pais.editar', compact('data'));
    }

    /**
     * Actualiza un país.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionPais $request, $id)
    {
        can('modificar-parametros');
        Paises::findOrFail($id)->update($request->all());
        return redirect('admin/pais')->with('mensaje', 'País actualizado con exito');
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
            if (Paises::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
