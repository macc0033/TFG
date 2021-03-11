<?php

use App\Models\Personal;
use Illuminate\Database\Seeder;

class PersonalAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personal= Personal::create([
            'nombre' => 'Miguel Ángel',
            'apellidos' => 'Carpio Colomo',
            'dni' => '21026554T',
            'subir_dni' => '',
            'foto' => 'foto.jpg',
            'sexo' => 'hombre',
            'fecha_nacimiento' => '1999-08-07',
            'telefono' => '640 78 80 43',
            'email_empresa' => 'macc0033@red.ujaen.es',
            'direccion' => 'Plza de la Victoria, 6, 2 izq',
            'codigo_postal' => 23650,
            'localidad' => 3590,
            'provincia' => 23,
            'pais' => 73,
            'usuario_id' => 1
        ]);
    }
}
