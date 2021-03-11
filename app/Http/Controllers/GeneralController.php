<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GeneralController extends Controller
{

    /**
     * Función que devuelve el html necesario para crear un SELECT en la vista, esta se utilizara mediante AJAX.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function obtener_localidades($id)
    {
        $html = '<option value="">Seleccionar Población</option>';
        if ($id) {
            $localidades = DB::table('sel_poblacion')
                        ->where('provincia', '=', $id)
                        ->get()
                        ->pluck('municipio', 'id')
                        ->toArray();

            foreach ($localidades as $key => $localidad) {
                $html .= '<option value="'.$key.'">'.$localidad.'</option>';
            }
        }

        return $html;
    }

    /**
     * Nos devuelve un PDF de la vista cargada.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf(){
        
        $pdf = \PDF::loadView('factura');
        return $pdf->stream();

        //return view('factura');
    }

    /**
     * Función para calcular el espacio ocupado en el directorio enviado.
     *
     * @param  disco  $disk
     * @param  ruta $directorio
     * @return \Illuminate\Http\Response
     */
    /*public static function space_disk($disk, $directorio = '/') {
        
        $directorio=str_replace('-','/',$directorio);
        $dir=Storage::disk($disk)->path($directorio);

        if(Storage::disk($disk)->has($directorio) or $directorio == '/'){
    
            $files = File::allFiles($dir);

            $file_size = 0;
            foreach( $files as $file)
            {    
                $file_size += $file->getSize();
            }

            return number_format((($file_size / 1048576) / 1048576 ),2); //GB 
            
        } else {
            return 0;
        }
    }*/


    /**
     * Devuelve JSON con listado completo de paises.
     *
     * @return \Illuminate\Http\Response
     */
    public function api_paises()
    {
        $paises = DB::table('sel_paises')
                ->get();
                
        return $paises;
    }

    /**
     * Devuelve JSON con listado completo de provincias.
     *
     * @return \Illuminate\Http\Response
     */
    public function api_provincias()
    {
        $provincias = DB::table('sel_provincias')
                ->get();
                
        return $provincias;
    }

    /**
     * Devuelve JSON con listado completo de localidad de una provincia.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function api_localidades($id)
    {
        $localidades = DB::table('sel_poblacion')
                ->where('provincia', '=', $id)
                //->pluck('municipio', 'id')
                ->get();
                
        return $localidades;
    }
}
