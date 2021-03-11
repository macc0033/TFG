<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $table = "sel_paises";
    protected $fillable = ['nombre','idioma','iso2','iso3','isonum'];
    public $timestamps = false;
}
