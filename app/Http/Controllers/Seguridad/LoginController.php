<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/inicio';
    protected $redirectPath = '/inicio';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Muestra la vista para logearse.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('seguridad.index');
    }

    /**
     * Establece la sesion del usuario.
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {   
        if ($user->activo==1) {
            $roles = $user->roles()->orderBy('id')->get();
            if ($roles->isNotEmpty()) {
                $user->setSession($roles->toArray());
            } else {
                $this->guard()->logout();
                $request->session()->invalidate();
                return redirect('/')->withErrors(['error' => 'Este usuario no tiene un rol valido']);
            }
        } else {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('/')->withErrors(['error' => 'Este usuario no esta activo']);
        }
    }

    public function username()
    {
        return 'usuario';
    }
}
