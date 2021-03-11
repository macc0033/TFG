<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTablas([
            'menu',
            'menu_rol',
            'permiso',
            'permiso_rol',
            'personal',
            'rol',
            'usuario',
            'usuario_rol'
        ]);
        // $this->call(UsersTableSeeder::class);
        $this->call(TablaRolSeeder::class);
        $this->call(TablaMenuSeeder::class);
        $this->call(TablaPermisoSeeder::class);
        $this->call(TablaEmpresaSeeder::class);
        $this->call(UsuarioAdministradorSeeder::class);
        $this->call(PersonalAdministradorSeeder::class);
        $this->call(TablasSelectSeeder::class);
    }

    protected function truncateTablas(array $tablas)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tablas as $tabla) {
            DB::table($tabla)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
