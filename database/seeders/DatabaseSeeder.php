<?php

namespace Database\Seeders;

use App\Models\Initialinventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $this->call(TipodedocumentosTableSeeder::class);
        $this->call(TipodeventasTableSeeder::class);
        $this->call(MarcasTableSeeder::class);
        $this->call(ModellosTableSeeder::class);

        $this->call(UserSeeder::class);

        //$this->call(InitialinventorySeeder::class);

        //$this->call(TipocomprobanteSeeder::class);
        //$this->call(TipodocumentoSeeder::class);

        //\App\Models\Supplier::factory(5)->create();

        $this->call(AwkirepresentadaSeeder::class);

        $this->call(AwkizonasTableSeeder::class);

        $this->call(AwkitiendasTableSeeder::class);
       $this->call(AwkiclientesTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');


    }
}
