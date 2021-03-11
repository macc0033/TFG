<?php

use Illuminate\Database\Seeder;

class TablasSelectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $path = 'database/sql/select.sql';
        DB::unprepared(file_get_contents($path));
    }
}
