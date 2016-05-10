<?php

use Illuminate\Database\Seeder;

class TiposPropiedadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipospropiedades')->insert([
            'codigo' => 'VIV',
            'descripcion' => 'Viviendas'
        ]);

        DB::table('tipospropiedades')->insert([
            'codigo' => 'TRA',
            'descripcion' => 'Trasteros'
        ]);

        DB::table('tipospropiedades')->insert([
            'codigo' => 'LOC',
            'descripcion' => 'Locales Comerciales'
        ]);
    }
}
