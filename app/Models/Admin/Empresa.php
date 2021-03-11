<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Empresa extends Model
{
    protected $table = "empresa";
    protected $fillable = ['cif', 'denominacion', 'nombre_comercial', 'telefono', 'email', 
    'direccion', 'codigo_postal', 'localidad', 'provincia', 'pais', 'logo'];

    /**
     * Upload del logo asociado a la empresa.
     *
     * @return \Illuminate\Http\Response
     */
    public static function setLogo($logo, $actual = false){

        if ($logo) {
            
            //Elimino el fichero antiguo
            if ($actual) {
                Storage::disk('public')->delete("empresa/logo/$actual");
            }

            //obtenemos el nombre del archivo
            $nomLogo = $logo->getClientOriginalName();
            
            $punto=strrpos($nomLogo, '.');
            $nombre=substr($nomLogo,0,$punto);
            $extension=substr($nomLogo,$punto);
            $i=0;
            while(Storage::disk('public')->exists('empresa/logo/'.$nomLogo)) {
                $nomLogo=$nombre."_".$i.$extension;
                $i++;
            }

            Storage::disk('public')->put('empresa/logo/'.$nomLogo,  File::get($logo));

            return $nomLogo;

        } else {
            return false;
        }
    }
}
