<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionPoblacion;
use App\Models\Admin\Poblacion;
use App\Models\Admin\Provincia;
use Illuminate\Http\Request;

class PoblacionController extends Controller
{
    /**
     * Mostrar un listado de poblaciones.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-parametros');
        $datas = Array();
        //$datas = Poblacion::orderBy('id')->get();

        $provincias = Provincia::get()->pluck('provincia', 'id')->toArray();

        return view('admin.poblacion.index', compact('datas', 'provincias'));
    }

        /**
     * Mostrar un listado de personal filtrado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function busqueda(Request $request){

        can('listar-personal'); 
        $datas = Poblacion::orderBy('id');
    
        if(!empty($request->provincia_bus)){
            $datas->where('provincia', $request->provincia_bus);
        }

        $datas = $datas->get();
        $busqueda = $request;
        $provincias = Provincia::get()->pluck('provincia', 'id')->toArray();

        return view('admin.poblacion.index', compact('datas', 'busqueda', 'provincias'));
    }

    /**
     * Muestra el formulario para añadir una población.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {   
        can('añadir-parametros');
        $provincias = Provincia::get()->pluck('provincia', 'id')->toArray();
        return view('admin.poblacion.crear', compact('provincias'));
    }

    /**
     * Añade una nueva población.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionPoblacion $request)
    {
        can('añadir-parametros');
        Poblacion::create($request->all());
        return redirect('admin/poblacion')->with('mensaje', 'Población creada con exito');
    }


    /**
     * Muestra el formulario para editar una población.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        can('ver-parametros');
        $data = Poblacion::findOrFail($id);

        if (!can('modificar-parametros',false)) {
            $data->only_view=1;
        }

        $provincias = Provincia::get()->pluck('provincia', 'id')->toArray();
        return view('admin.poblacion.editar', compact('data', 'provincias'));
    }

    /**
     * Actualiza una población.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionPoblacion $request, $id)
    {
        can('modificar-parametros');
        Poblacion::findOrFail($id)->update($request->all());
        return redirect('admin/poblacion')->with('mensaje', 'Población actualizada con exito');
    }

    /**
     * Elimina una población.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        can('eliminar-parametros');
        if ($request->ajax()) {
            if (Poblacion::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
