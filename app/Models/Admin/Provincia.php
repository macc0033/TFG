<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = "sel_provincias";
    protected $fillable = ['provincia'];
    public $timestamps = false;
}
