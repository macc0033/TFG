<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = 'noticia';
    protected $fillable = ['fecha', 'titulo', 'descripcion', 'personal_id'];
    
    /**
     * Relación de una noticia con su autor.
     *
     * @return \Illuminate\Http\Response
     */
    public function autor() {
        return $this->belongsTo('App\Models\Personal', 'personal_id', 'id');
    }

    /**
     * Devuelve el fecha formateada en Español.
     *
     * @return \Illuminate\Http\Response
     */
    function getFechaAttribute() {

        return date('d-m-Y',strtotime($this->attributes['fecha']));
    }

    /**
     * Establece la fecha formateada en Ingles.
     *
     * @return \Illuminate\Http\Response
     */
    function setFechaAttribute($value) {

        $this->attributes['fecha'] = date('Y-m-d',strtotime($value));
    }
}
