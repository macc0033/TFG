<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class Personal extends Model
{
    use Notifiable;

    protected $table = 'personal';

    protected $fillable = ['nombre', 'apellidos', 'dni', 'subir_dni', 'foto', 'sexo', 'fecha_nacimiento', 
    'telefono', 'email_empresa', 'direccion', 'codigo_postal', 'localidad', 'provincia', 'pais'];

    /**
     * Relación de un Personal con su usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function usuario() {
        return $this->belongsTo('App\Models\Seguridad\Usuario')->with('roles:id,nombre');
    }

    /**
     * Relación de un Personal y multiples noticias.
     *
     * @return \Illuminate\Http\Response
     */
    public function noticias() {
        return $this->hasMany('App\Models\Noticia');
    }

    /**
     * Devuelve el nombre completo de la persona
     *
     * @return \Illuminate\Http\Response
     */
    public function getFullNameAttribute() {
        return $this->nombre . ' ' . $this->apellidos;
    }

    /**
     * Upload de un fichero en una ruta dada asociado a un personal.
     *
     * @param upfile $archivo
     * @param string $ruta
     * @return \Illuminate\Http\Response
     */
    public static function setArchivo($archivo, $ruta, $actual = false){

        if ($archivo) {
            
            //Elimino el fichero antiguo
            if ($actual) {
                Storage::disk('public')->delete($ruta.$actual);
            }

            //obtenemos el nombre del archivo
            $nomArchivo = $archivo->getClientOriginalName();
            
            $punto=strrpos($nomArchivo, '.');
            $nombre=substr($nomArchivo,0,$punto);
            $extension=substr($nomArchivo,$punto);
            $i=0;
            while(Storage::disk('public')->exists($ruta.$nomArchivo)) {
                $nomArchivo=$nombre."_".$i.$extension;
                $i++;
            }

            Storage::disk('public')->put($ruta.$nomArchivo,  File::get($archivo));

            return $nomArchivo;

        } else {
            return false;
        }
    }
}
