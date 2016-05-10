<?php

use Illuminate\Database\Seeder;

class TiposPagosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipospagos')->insert([
            'codigo' => 'EF',
            'descripcion' => 'Efectivo'
        ]);

        DB::table('tipospagos')->insert([
            'codigo' => 'TR',
            'descripcion' => 'Transferencia'
        ]);

        DB::table('tipospagos')->insert([
            'codigo' => 'PA',
            'descripcion' => 'Pagaré'
        ]);

        DB::table('tipospagos')->insert([
            'codigo' => 'RE',
            'descripcion' => 'Recibo'
        ]);
    }
}
