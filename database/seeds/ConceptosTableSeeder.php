<?php

use Illuminate\Database\Seeder;

class ConceptosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conceptos')->insert([
            'tipo' => 'ingreso',
            'nombre' => 'Cuota'
        ]);

        DB::table('conceptos')->insert([
            'tipo' => 'ingreso',
            'nombre' => 'Derrama'
        ]);

        DB::table('conceptos')->insert([
            'tipo' => 'ingreso',
            'nombre' => 'Otros'
        ]);


        DB::table('conceptos')->insert([
            'tipo' => 'gasto',
            'nombre' => 'Luz'
        ]);

        DB::table('conceptos')->insert([
            'tipo' => 'gasto',
            'nombre' => 'Agua'
        ]);

        DB::table('conceptos')->insert([
            'tipo' => 'gasto',
            'nombre' => 'Ascensor'
        ]);

        DB::table('conceptos')->insert([
            'tipo' => 'gasto',
            'nombre' => 'Limpieza'
        ]);

        DB::table('conceptos')->insert([
            'tipo' => 'gasto',
            'nombre' => 'Otros'
        ]);
    }
}
