<?php

use App\Models\Admin\Menu;
use Illuminate\Database\Seeder;

class TablaMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create([
            'menu_id' => 0,
            'nombre' => 'Inicio',
            'url' => 'inicio',
            'orden' => 1,
            'icono' => 'fa-home',
        ]);
        
        $menu = Menu::create([
            'menu_id' => 0,
            'nombre' => 'Personal',
            'url' => 'personal',
            'orden' => 2,
            'icono' => 'fa-users',
        ]);

        $menu = Menu::create([
            'menu_id' => 0,
            'nombre' => 'Admin',
            'url' => '#',
            'orden' => 3,
            'icono' => 'fa-cog',
        ]);

        $menu = Menu::create([
            'menu_id' => 3,
            'nombre' => 'Empresa',
            'url' => 'admin/empresa/1/editar',
            'orden' => 1,
            'icono' => 'fa-atom',
        ]);
        
        $menu = Menu::create([
            'menu_id' => 3,
            'nombre' => 'Usuarios',
            'url' => 'admin/usuario',
            'orden' => 2,
            'icono' => 'fa-users',
        ]);
        
        $menu = Menu::create([
            'menu_id' => 3,
            'nombre' => 'Roles',
            'url' => 'admin/rol',
            'orden' => 3,
            'icono' => 'fa-registered',
        ]);

        $menu = Menu::create([
            'menu_id' => 3,
            'nombre' => 'Menu',
            'url' => 'admin/menu',
            'orden' => 4,
            'icono' => 'fa-list',
        ]);
        
        $menu = Menu::create([
            'menu_id' => 3,
            'nombre' => 'Menu - Rol',
            'url' => 'admin/menu-rol',
            'orden' => 5,
            'icono' => 'fa-server',
        ]);

        $menu = Menu::create([
            'menu_id' => 3,
            'nombre' => 'Permisos',
            'url' => 'admin/permiso',
            'orden' => 6,
            'icono' => 'fa-hand-paper',
        ]);

        $menu = Menu::create([
            'menu_id' => 3,
            'nombre' => 'Permisos - Rol',
            'url' => 'admin/permiso-rol',
            'orden' => 7,
            'icono' => 'fa-ban',
        ]);

        $menu = Menu::create([
            'menu_id' => 3,
            'nombre' => 'Gestor Archivos',
            'url' => 'admin/archivos',
            'orden' => 8,
            'icono' => 'fa-folder-open',
        ]);

        $menu = Menu::create([
            'menu_id' => 3,
            'nombre' => 'Calendario',
            'url' => 'calendar',
            'orden' => 9,
            'icono' => 'fa-calendar-alt',
        ]);

        $menu = Menu::create([
            'menu_id' => 3,
            'nombre' => 'Parametros',
            'url' => '#',
            'orden' => 10,
            'icono' => 'fa-cog',
        ]);

        $menu = Menu::create([
            'menu_id' => 13,
            'nombre' => 'Paises',
            'url' => 'admin/pais',
            'orden' => 1,
            'icono' => 'fa-globe-americas',
        ]);

        $menu = Menu::create([
            'menu_id' => 13,
            'nombre' => 'Provincias',
            'url' => 'admin/provincia',
            'orden' => 2,
            'icono' => 'fa-map',
        ]);

        $menu = Menu::create([
            'menu_id' => 13,
            'nombre' => 'Poblaciones',
            'url' => 'admin/poblacion',
            'orden' => 3,
            'icono' => 'fa-street-view',
        ]);
    }
}
