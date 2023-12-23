<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinaregistrals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            /* $table->string('direccion')->nullable();
            $table->string('correo')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable(); */
            $table->boolean('state')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oficinaregistrals');
    }
};
