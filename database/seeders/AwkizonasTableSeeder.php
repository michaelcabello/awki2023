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
                'name' => 'Zona Tarapoto',
                'description' => 'dededede deded',
                'state' => 1,
                'awkirepresentada_id' => 2,
                'created_at' => '2023-11-07 22:25:57',
                'updated_at' => '2023-11-07 22:57:14',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'tarapoto norte',
                'description' => 'tarapoto norte',
                'state' => 1,
                'awkirepresentada_id' => 2,
                'created_at' => '2023-11-07 23:20:28',
                'updated_at' => '2023-11-07 23:20:28',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'tarapoto sur',
                'description' => 'tarapoto sur',
                'state' => 1,
                'awkirepresentada_id' => 3,
                'created_at' => '2023-11-07 23:20:47',
                'updated_at' => '2023-11-07 23:20:47',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'tarapoto centro',
                'description' => 'tarapoto centro',
                'state' => 1,
                'awkirepresentada_id' => 3,
                'created_at' => '2023-11-07 23:20:47',
                'updated_at' => '2023-11-07 23:20:47',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'piura norte',
                'description' => 'piura norte',
                'state' => 1,
                'awkirepresentada_id' => 3,
                'created_at' => '2023-11-07 23:20:47',
                'updated_at' => '2023-11-07 23:20:47',
            ),

        ));


    }
}
