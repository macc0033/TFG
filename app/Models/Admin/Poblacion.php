<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Poblacion extends Model
{
    protected $table = "sel_poblacion";
    protected $fillable = ['provincia','municipio'];
    public $timestamps = false;
}
