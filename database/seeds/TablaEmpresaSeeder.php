<?php

use App\Models\Admin\Empresa;
use Illuminate\Database\Seeder;

class TablaEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empresa= Empresa::create([
            'cif' => 'B00000000',
            'denominacion' => 'Denominación Empresa',
            'nombre_comercial' => 'Nombre Comercial Empresa',
            'telefono' => null,
            'email' => 'email@empresa.com',
            'direccion' => 'Dirección Empresa',
            'codigo_postal' => null,
            'localidad' => null,
            'provincia' => null,
            'pais' => 73,
            'logo' => 'logo.png',
        ]);
    }
}
