<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MarcasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('marcas')->delete();
        
        \DB::table('marcas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'TOYATA',
                'state' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'CHEVROLET',
                'state' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}