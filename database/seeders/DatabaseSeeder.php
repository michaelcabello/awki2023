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
        // \App\Models\User::factory(10)->create();


        $this->call(TipodedocumentosTableSeeder::class);
        $this->call(TipodeventasTableSeeder::class);
        $this->call(MarcasTableSeeder::class);
        $this->call(ModellosTableSeeder::class);


        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(SubcategorySeeder::class);
        Storage::deleteDirectory('public/categories');
        Storage::makeDirectory('public/categories');

        Storage::deleteDirectory('public/brands');
        Storage::makeDirectory('public/brands');

        Storage::deleteDirectory('public/products');
        Storage::makeDirectory('public/products');

        // \App\Models\User::factory(10)->create();

        //\App\Models\Category::factory(20)->create();

        \App\Models\Brand::factory(5)->create();
        \App\Models\Modelo::factory(5)->create();

        $this->call(ModeloSeeder::class);

        //$this->call(ConfigurationSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(CtacteSeeder::class);

        $this->call(TaxSeeder::class);
        $this->call(UmSeeder::class);

        \App\Models\Product::factory(10)->create();
        $this->call(LocalSeeder::class);
        $this->call(UserSeeder::class);

        //$this->call(PermissionsTableSeeder::class);
        //$this->call(RolesTableSeeder::class);


        $this->call(InitialinventorySeeder::class);


        $this->call(TipocomprobanteSeeder::class);
        $this->call(TipodocumentoSeeder::class);


        \App\Models\Customer::factory(5)->create();

        $this->call(LocalTipocomprobanteSeeder::class);

        $this->call(GroupatributeSeeder::class);
        $this->call(AtributeSeeder::class);


        $this->call(ProductfamiliesTableSeeder::class);
        $this->call(ProductatributesTableSeeder::class);
        $this->call(AtributeProductatributeTableSeeder::class);
        $this->call(LocalProductatributeTableSeeder::class);

        \App\Models\Supplier::factory(5)->create();

        $this->call(AwkirepresentadaSeeder::class);
       // $this->call(AwkirepresentadasTableSeeder::class);
        $this->call(AwkizonasTableSeeder::class);
       // $this->call(UsersTableSeeder::class);
        $this->call(AwkitiendasTableSeeder::class);
        $this->call(AwkiclientesTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');


    }
}
