<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TipodeventasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tipodeventas')->delete();
        
        \DB::table('tipodeventas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Contado',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Crédito',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}