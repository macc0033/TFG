<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionEmpresa;
use App\Models\Admin\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    /**
     * Muestra el formulario para editar la ficha de la empresa.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        can('ver-empresa');
        $data = Empresa::findOrFail($id);
        
        if ($data->provincia!='') {
            $localidades = DB::table('sel_poblacion')->where('provincia', '=', $data->provincia)->get()->pluck('municipio', 'id')->toArray();
        } else {
            $localidades = [0 => 'Seleccionar Provincia'];
        }
        $provincias = DB::table('sel_provincias')->get()->pluck('provincia', 'id')->toArray();
        $paises = DB::table('sel_paises')->get()->pluck('nombre', 'id')->toArray();
        
        if ($data->logo) $data->logo='empresa/logo/'.$data->logo;

        if (!can('modificar-empresa',false)) {
            $data->only_view=1;
        }

        return view('admin.empresa.editar', compact('data', 'localidades', 'provincias', 'paises'));
    }

    /**
     * Actualiza la ficha de la empresa.
     *
     * @param  \Illuminate\Http\ValidacionEmpresa  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionEmpresa $request, $id)
    {
        can('modificar-empresa');
        $empresa = Empresa::findOrFail($id);

        $data = $request->except('logo');
        //$request->request->add(['logo' => $logo]);
        if ($logo = Empresa::setLogo($request->file('logo'),$empresa->logo)) {
            $data['logo'] = $logo;
        }

        $empresa->update(array_filter($data));

        return redirect("admin/empresa/$id/editar")->with('mensaje', 'Empresa actualizada con exito');
    }
}
