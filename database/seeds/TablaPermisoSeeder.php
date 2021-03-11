<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Permiso;

class TablaPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Permiso::class)->times(50)->create();

        $permiso = Permiso::create([
            'nombre' => 'Listar Usuarios',
            'slug' => 'listar-usuarios'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Ver Usuarios',
            'slug' => 'ver-usuarios'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Modificar Usuarios',
            'slug' => 'modificar-usuarios'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Añadir Usuarios',
            'slug' => 'añadir-usuarios'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Eliminar Usuarios',
            'slug' => 'eliminar-usuarios'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Listar Roles',
            'slug' => 'listar-roles'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Ver Roles',
            'slug' => 'ver-roles'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Modificar Roles',
            'slug' => 'modificar-roles'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Añadir Roles',
            'slug' => 'añadir-roles'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Eliminar Roles',
            'slug' => 'eliminar-roles'
        ]);
        
        $permiso = Permiso::create([
            'nombre' => 'Listar Menús',
            'slug' => 'listar-menus'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Ver Menús',
            'slug' => 'ver-menus'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Modificar Menús',
            'slug' => 'modificar-menus'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Añadir Menús',
            'slug' => 'añadir-menus'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Eliminar Menús',
            'slug' => 'eliminar-menus'
        ]);
        
        $permiso = Permiso::create([
            'nombre' => 'Listar Permisos',
            'slug' => 'listar-permisos'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Ver Permisos',
            'slug' => 'ver-permisos'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Modificar Permisos',
            'slug' => 'modificar-permisos'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Añadir Permisos',
            'slug' => 'añadir-permisos'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Eliminar Permisos',
            'slug' => 'eliminar-permisos'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Exportar Listados ',
            'slug' => 'exportar-listados'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Asignar Menús ',
            'slug' => 'asignar-menus'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Asignar Permisos ',
            'slug' => 'asignar-permisos'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Listar Personal',
            'slug' => 'listar-personal'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Ver Personal',
            'slug' => 'ver-personal'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Modificar Personal',
            'slug' => 'modificar-personal'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Añadir Personal',
            'slug' => 'añadir-personal'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Eliminar Personal',
            'slug' => 'eliminar-personal'
        ]);
        
        $permiso = Permiso::create([
            'nombre' => 'Ver Empresa',
            'slug' => 'ver-empresa'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Modificar Empresa',
            'slug' => 'modificar-empresa'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'NavBar Notificaciones',
            'slug' => 'navbar-notificaciones'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'NavBar Contacto',
            'slug' => 'navbar-contacto'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'NavBar Mensajes',
            'slug' => 'navbar-mensajes'
        ]);
        
        $permiso = Permiso::create([
            'nombre' => 'Gestor Archivos',
            'slug' => 'gestor-archivos'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Datos Propios',
            'slug' => 'datos-propios'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Archivos Personal',
            'slug' => 'archivos-personal'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Ver Calendario',
            'slug' => 'ver-calendario'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Conectar como',
            'slug' => 'conectar-como'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Ver Agenda Personal',
            'slug' => 'ver-agenda-personal'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Listar Parametros',
            'slug' => 'listar_parametros'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Ver Parametros',
            'slug' => 'ver_parametros'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Modificar Parametros',
            'slug' => 'modificar_parametros'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Añadir Parametros',
            'slug' => 'añadir_parametros'
        ]);

        $permiso = Permiso::create([
            'nombre' => 'Eliminar Parametros',
            'slug' => 'eliminar_parametros'
        ]);
        
        $permiso = Permiso::create([
            'nombre' => 'Solo Propia Personal',
            'slug' => 'solo-propia-personal'
        ]);
    }
}
