<?php

use App\Models\Admin\Permiso;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

if (!function_exists('getMenuActivo')) {
    function getMenuActivo($ruta)
    {
        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'active';
        } else {
            return '';
        }
    }
}

if (!function_exists('can')) {
    function can($permiso, $redirect = true)
    {   
        
        if (session()->get('rol_id') == 1) {
            return true;
        } else if (is_array(session()->get('rol'))) {
            $permisos = Array();
            foreach (session()->get('rol') as $key => $rol) {

                $rolId = $rol['id'];
                $permisos_rol = cache()->tags('Permiso')->rememberForever("Permiso.rolid.$rolId", function () use ($rolId) {
                    return Permiso::whereHas('roles', function ($query) use ($rolId) {
                        $query->where('rol_id', $rolId);
                    })->get()->pluck('slug')->toArray();
                });

                $permisos= array_unique(array_merge($permisos, $permisos_rol));
                session()->put('permisos', $permisos);
            }
            
            if (!in_array($permiso, $permisos)) {
                if ($redirect) {
                    if (!request()->ajax())
                        return redirect()->route('inicio')->with('mensaje-error', 'No tienes permisos para entrar en este modulo')->send();
                    abort(403, 'No tiene permiso');
                } else {
                    return false;
                }
            }
            return true;
            
        } else {
            return redirect()->route('logout');
        }
    }
}

if (!function_exists('ver_pais')) {
    function ver_pais($pais)
    {
        if ($pais!=0) {
            $pais=DB::table('sel_paises')
                        ->select('nombre')
                        ->where('id', '=', $pais)
                        ->first();

            if (isset($pais->nombre)) return $pais->nombre;
            else return false;

        } else return false;
    }
}

if (!function_exists('ver_provincia')) {
    function ver_provincia($provincia)
    {
        if ($provincia!=0) {
            $provincia=DB::table('sel_provincias')
                        ->select('provincia')
                        ->where('id', '=', $provincia)
                        ->first();

            if (isset($provincia->provincia)) return $provincia->provincia;
            else return false;

        } else return false;
    }
}

if (!function_exists('ver_localidad')) {
    function ver_localidad($localidad)
    {   
        if ($localidad!=0) {
            $localidad=DB::table('sel_poblacion')
                        ->select('municipio')
                        ->where('id', '=', $localidad)
                        ->first();

            if (isset($localidad->municipio)) return $localidad->municipio;
            else return false;

        } else return false;
    }
}