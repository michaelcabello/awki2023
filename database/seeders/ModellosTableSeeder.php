<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ModellosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('modellos')->delete();
        
        \DB::table('modellos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'MODELO 1',
                'state' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'MODELO 2',
                'state' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}