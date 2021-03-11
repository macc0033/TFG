<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Http\Requests\ValidacionMenu;

class MenuController extends Controller
{
    /**
     * Muestra el listado de menus.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        can('listar-menus');
        $menus = Menu::getMenu();
        return view('admin.menu.index', compact('menus'));
    }

    /**
     * Muestra el formulario para crear un nuevo menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('añadir-menus');
        return view('admin.menu.crear');
    }

    /**
     * Añade un nuevo menu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionMenu $request)
    {
        can('añadir-menus');
        Menu::create($request->all());
        return redirect('admin/menu/crear')->with('mensaje', 'Menú creado con exito');
    }
    /**
     * Muestra el formulario para editar un menu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        can('ver-menus');
        $data = Menu::findOrFail($id);

        if (!can('modificar-menus',false)) {
            $data->only_view=1;
        }

        return view('admin.menu.editar', compact('data'));
    }

    /**
     * Actualiza un menu existente.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionMenu $request, $id)
    {
        can('modificar-menus');
        Menu::findOrFail($id)->update($request->all());
        return redirect('admin/menu')->with('mensaje', 'Menú actualizado con exito');
    }

    /**
     * Elimina un menu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        can('eliminar-menus');
        Menu::destroy($id);
        return redirect('admin/menu')->with('mensaje', 'Menú eliminado con exito');
    }

    public function guardarOrden(Request $request)
    {
        if ($request->ajax()) {
            $menu = new Menu;
            $menu->guardarOrden($request->menu);
            return response()->json(['respuesta' => 'ok']);
        } else {
            abort(404);
        }
    }
}
