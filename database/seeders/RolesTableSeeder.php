<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Admin',
                'display_name' => 'Administrador',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),

        ));


    }
}
