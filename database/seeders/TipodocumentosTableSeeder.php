<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TipodocumentosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tipodocumentos')->delete();
        
        \DB::table('tipodocumentos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'documento nacional de identidad',
                'abbreviation' => 'DNI',
                'state' => 1,
                'created_at' => '2023-11-13 22:17:08',
                'updated_at' => '2023-11-13 22:17:08',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Registro Unico del Contribuyente',
                'abbreviation' => 'RUC',
                'state' => 1,
                'created_at' => '2023-11-13 22:17:08',
                'updated_at' => '2023-11-13 22:17:08',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Carnet de Extranjeria',
                'abbreviation' => 'CE',
                'state' => 1,
                'created_at' => '2023-11-13 22:17:08',
                'updated_at' => '2023-11-13 22:17:08',
            ),
        ));
        
        
    }
}