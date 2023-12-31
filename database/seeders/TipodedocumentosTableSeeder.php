<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TipodedocumentosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('tipodedocumentos')->delete();

        \DB::table('tipodedocumentos')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nombre' => 'FACTURA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'nombre' => 'BOLETA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'nombre' => 'GUIA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),

        ));


    }
}
