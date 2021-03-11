<?php

namespace App\Http\Controllers;

use App\Exports\PersonalExport;
use App\Http\Requests\ValidacionPersonal;
use App\Models\Admin\Paises;
use App\Models\Admin\Poblacion;
use App\Models\Admin\Provincia;
use App\Models\Admin\Rol;
use App\Models\Personal;
use App\Models\Seguridad\Usuario;
use App\Notifications\RegistroCuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PersonalController extends Controller
{
    /**
     * Mostrar un listado de personal.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //ACCESO SOLO A SU PROPIA FICHA
        if (session('permisos')) {
            if (in_array('solo-propia-personal', session('permisos')) && !in_array('listar-personal', session('permisos'))) {
                return redirect('personal/'.session('personal_id_usuario') .'/editar');
            }
        }

        can('listar-personal');
        $datas = Personal::with('usuario')
                    ->where('id', '!=', 1)
                    ->orderBy('id')->get();

        return view('personal.index', compact('datas'));
    }
    
    /**
     * Mostrar un listado de personal filtrado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function busqueda(Request $request){

        can('listar-personal'); 
        $datas = Personal::with('usuario');
    
        if(!empty($request->dni_bus)){
            $datas->where('dni', $request->dni_bus);
        }
        
        $datas = $datas->get();
        $busqueda = $request;


        return view('personal.index', compact('datas', 'busqueda'));
    }

    /**
     * Mostrar el formulario para crear una ficha de personal.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        can('añadir-personal');
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();

        $localidades = [0 => 'Seleccionar Provincia'];
        $provincias = Provincia::get()->pluck('provincia', 'id')->toArray();
        $paises = Paises::get()->pluck('nombre', 'id')->toArray();

        return view('personal.crear', compact('rols', 'localidades', 'provincias', 'paises'));
    }

    /**
     * Guardar una nueva ficha de personal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionPersonal $request)
    {

        can('añadir-personal');
        if ($request['fecha_nacimiento']) $request['fecha_nacimiento'] = date("Y-m-d", strtotime($request['fecha_nacimiento']));

        $data = $request->except('foto', 'subir_dni');
        //$request->request->add(['foto' => $foto]);
        if ($foto = Personal::setArchivo($request->file('foto'), 'personal/foto/')) {
            $data['foto'] = $foto;
        }

        if ($subir_dni = Personal::setArchivo($request->file('subir_dni'), 'personal/dni/')) {
            $data['subir_dni'] = $subir_dni;
        }
        
        $personal = Personal::create($data);
        
        $usuario = Usuario::create($request->all());
        $usuario->roles()->sync($request->rol_id);
        $usuario->personal()->save($personal);

        Storage::disk('private')->makeDirectory('personal/'.$usuario->usuario, 0755, true, true); 

        //ENVIAR EMAIL REGISTRO
        if ($request['email']) {
            $personal->contraseña=$request['password'];
            $personal->email=$request['email'];
            $personal->notify(new RegistroCuenta($personal));
        }
        
        return redirect('personal')->with('mensaje', 'Ficha Personal creada con exito');
    }

    /**
     * Mostrar el formulario para editar una ficha de personal.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        can('ver-personal');
        
        if (session('permisos')) {
            if (in_array('solo-propia-personal', session('permisos')) && session()->get('personal_id_usuario')!=$id) {
                return redirect("personal/".session()->get('personal_id_usuario')."/editar");
            }
        }

        $data = Personal::with('usuario')->findOrFail($id);
        $rols = Rol::orderBy('id')->pluck('nombre', 'id')->toArray();
        
        if ($data->provincia!='') {
            $localidades = Poblacion::where('provincia', '=', $data->provincia)->get()->pluck('municipio', 'id')->toArray();
        } else {
            $localidades = [0 => 'Seleccionar Provincia'];
        }
        $provincias = Provincia::get()->pluck('provincia', 'id')->toArray();
        $paises = Paises::get()->pluck('nombre', 'id')->toArray();

        if ($data->foto) $data->foto='personal/foto/'.$data->foto;
        if ($data->subir_dni) $data->subir_dni='personal/dni/'.$data->subir_dni;

        if (!can('modificar-personal',false)) {
            $data->only_view=1;
            $data->usuario->only_view=1;
        }

        return view('personal.editar', compact('data', 'rols', 'localidades', 'provincias', 'paises'));
        
    }

    /**
     * Actualizar una ficha de personal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionPersonal $request, $id)
    {
        can('modificar-personal');

        $personal = Personal::with('usuario')->findOrFail($id);
        if ($request['fecha_nacimiento']) $request['fecha_nacimiento'] = date("Y-m-d", strtotime($request['fecha_nacimiento']));

        $data = $request->except('foto', 'subir_dni');
        //$request->request->add(['foto' => $foto]);
        if ($foto = Personal::setArchivo($request->file('foto'), 'personal/foto/', $personal->foto)) {
            $data['foto'] = $foto;
        }

        if ($subir_dni = Personal::setArchivo($request->file('subir_dni'), 'personal/dni/', $personal->subir_dni)) {
            $data['subir_dni'] = $subir_dni;
        }

        if (session('permisos')) {
            if (in_array('solo-propia-personal', session('permisos'))) {
                $request->activo=1;
                unset($request->rol_id);
                unset($request->delegacion_id);
            }
        }
        
        $personal->update($data);
        
        $personal->usuario->update(array_filter($request->all()));
        if ($request->rol_id) $personal->usuario->roles()->sync($request->rol_id);

        if(!$request->activo){
            $personal->usuario->update(array('activo' => 0));
        }

        if(!Storage::disk('private')->has('personal/'.$personal->usuario->usuario)){
            Storage::disk('private')->makeDirectory('personal/'.$personal->usuario->usuario, 0755, true, true); 
        }
        
        return redirect('personal/'.$id.'/editar')->with('mensaje', 'Ficha Personal actualizada con exito');
    }

    /**
     * Eliminar una ficha de personal.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        can('eliminar-personal');
        if ($request->ajax()) {
            $personal = Personal::with('usuario')->findOrFail($id);
            $usuario = $personal->usuario;

            if (Personal::destroy($id)) {

                //Elimino el fichero antiguo
                Storage::disk('public')->delete('personal/dni/'.$personal->subir_dni);

                //Elimino el fichero antiguo
                Storage::disk('public')->delete('personal/foto/'.$personal->foto);

                //Elimino el directorio privado
                Storage::disk('private')->deleteDirectory('personal/'.$usuario->usuario); 

                $usuario->delete();
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
         } else {
            abort(404);
        }
    }

    /**
     * Exportar a excel un listado.
     *
     * @return \Illuminate\Http\Response
     */
    public function export() 
    {
        return Excel::download(new PersonalExport, 'personal.xlsx');
    }

    /**
     * Mostrar la Vista con los archivos asociados a una ficha de personal.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function archivos($id){
        
        can('archivos-personal');
        $data = Personal::with('usuario')->findOrFail($id);

        return view('gestor', compact('data'));
    }

    /**
     * Funcionalidad para cambiar de usuario sin tener que desconectar la sesion actual.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function conectar($id){
        
        can('conectar-como');
        $data = Personal::with('usuario')->findOrFail($id);

        $user=$data->usuario;
        $roles = $user->roles()->orderBy('id')->get();

        $user->setSession($roles->toArray());

        return redirect('inicio')->with('mensaje', 'Conectado correctamente.');
    }

    /**
     * Función que devuelve el html necesario para crear un SELECT en la vista, esta se utilizara mediante AJAX.
     * 
     * @return \Illuminate\Http\Response
     */
    public function obtener_personal()
    {
        $html = '<option value="">Seleccionar Personal</option>';
        $personal = Personal::where('id', '!=', 1)->whereHas('usuario', function ($query) {
            $query->where('activo', '=', 1);
        })->get()->pluck('full_name', 'id')
                    ->toArray();

        foreach ($personal as $key => $ficha) {
            $html .= '<option value="'.$key.'">'.$ficha.'</option>';
        }

        return $html;
    }
}
