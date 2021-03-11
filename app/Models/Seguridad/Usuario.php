<?php

namespace App\Models\Seguridad;

use App\Models\Admin\Empresa;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\Rol;
use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class Usuario extends Authenticatable
{

    use Notifiable;
    
    protected $remember_token = false;
    protected $table = 'usuario';
    protected $fillable = ['usuario', 'password', 'email', 'activo'];

    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'usuario_rol');
    }

    /**
     * Relación de un Usuario con su Ficha Personal.
     *
     * @return \Illuminate\Http\Response
     */
    public function personal() {
        return $this->hasOne('App\Models\Personal');
    }

    /**
     * Añade valores a la sesion.
     *
     * @param array $roles
     * @return \Illuminate\Http\Response
     */
    public function setSession($roles)
    {
        Session::put(
            [
                'rol' => $roles,
                'rol_id' => $roles[0]['id'],
                'rol_nombre' => $roles[0]['nombre'],
                'usuario' => $this->usuario,
                'usuario_id' => $this->id,
                'nombre_usuario' => $this->personal->nombre,
                'apellidos_usuario' => $this->personal->apellidos,
                'imagen_usuario' => $this->personal->foto,
                'personal_id_usuario' => $this->personal->id
            ]
        );
    }

    /**
     * Cifra el password.
     *
     * @param string $pass
     * @return \Illuminate\Http\Response
     */
    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }

    /**
     * Envia el email para recuperar contraseña.
     *
     * @param string $pass
     * @return \Illuminate\Http\Response
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }

}
