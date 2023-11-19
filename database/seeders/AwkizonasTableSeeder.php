<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AwkizonasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('awkizonas')->delete();
        
        \DB::table('awkizonas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Zona Tarapoto toyota',
                'description' => 'dededede deded toyota',
                'state' => 1,
                'awkirepresentada_id' => 2,
                'created_at' => '2023-11-07 22:25:57',
                'updated_at' => '2023-11-10 15:12:25',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'tarapoto norte toyota',
                'description' => 'tarapoto norte toyota',
                'state' => 1,
                'awkirepresentada_id' => 2,
                'created_at' => '2023-11-07 23:20:28',
                'updated_at' => '2023-11-10 15:12:15',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'tarapoto sur chevrolet',
                'description' => 'tarapoto sur chevrolet',
                'state' => 1,
                'awkirepresentada_id' => 3,
                'created_at' => '2023-11-07 23:20:47',
                'updated_at' => '2023-11-10 15:13:05',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'tarapoto centro chevrolet',
                'description' => 'tarapoto centro chevrolet',
                'state' => 1,
                'awkirepresentada_id' => 3,
                'created_at' => '2023-11-07 23:20:47',
                'updated_at' => '2023-11-10 15:12:53',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'piura norte chevrolet',
                'description' => 'piura norte chevrolet',
                'state' => 1,
                'awkirepresentada_id' => 3,
                'created_at' => '2023-11-07 23:20:47',
                'updated_at' => '2023-11-10 15:12:42',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'zona hyo toyota',
                'description' => 'zona hyo toyotazona hyo toyota',
                'state' => 1,
                'awkirepresentada_id' => 2,
                'created_at' => '2023-11-10 15:11:39',
                'updated_at' => '2023-11-10 15:11:39',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'zona norte de integra cajamarca',
                'description' => 'zona norte de integra cajamarca',
                'state' => 1,
                'awkirepresentada_id' => 6,
                'created_at' => '2023-11-11 16:57:55',
                'updated_at' => '2023-11-11 16:57:55',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'yamaha pucallpa',
                'description' => 'yamaha pucallpa',
                'state' => 1,
                'awkirepresentada_id' => 7,
                'created_at' => '2023-11-11 16:59:47',
                'updated_at' => '2023-11-11 16:59:50',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'ZONA JAEN  YAMAHA',
                'description' => 'ZONA JAEN  YAMAHA',
                'state' => 1,
                'awkirepresentada_id' => 7,
                'created_at' => '2023-11-11 17:00:27',
                'updated_at' => '2023-11-11 17:00:31',
            ),
        ));
        
        
    }
}