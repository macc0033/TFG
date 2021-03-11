<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionNoticia;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Mostrar un listado de noticias.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //can('listar-noticias');
        $datas = Noticia::with('autor')->orderBy('fecha', 'desc')->get();
        return view('noticia.index', compact('datas'));
    }

    /**
     * Muestra el formulario para añadir una noticia.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {   
        can('añadir-noticias');

        $datos=collect(new Noticia);
        $datos->fecha=date('d-m-Y',time());
        $datos->personal_id=session('personal_id_usuario');

        return view('noticia.crear', compact('datos'));
    }

    /**
     * Añade una nueva noticia.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionNoticia $request)
    {
        can('añadir-noticias');
        Noticia::create($request->all());
        return redirect('inicio')->with('mensaje', 'Noticia creada con exito.');
    }


    /**
     * Muestra el formulario para editar una noticia.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        can('ver-noticias');
        $data = Noticia::findOrFail($id);

        if (!can('modificar-parametros',false)) {
            $data->only_view=1;
        }
        return view('noticia.editar', compact('data'));
    }

    /**
     * Actualiza una serie de facturación.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionNoticia $request, $id)
    {
        can('modificar-noticias');
        Noticia::findOrFail($id)->update($request->all());
        return redirect('inicio')->with('mensaje', 'Noticia actualizada con exito.');
    }

    /**
     * Elimina una noticia.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        can('eliminar-noticias');
        if ($request->ajax()) {
            if (Noticia::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
