<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    /**
     * Devuelve la Vista Principal del Admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin.index');
    }

    /**
     * Muestra la Vista Archivos de manera general.
     *
     * @return \Illuminate\Http\Response
     */
    public function archivos(){
        
        can('gestor-archivos');
        return view('gestor');
    }
}
