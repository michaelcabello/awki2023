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
        Schema::create('observacions', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->text('descripcion')->nullable();
            $table->date('fechaobservacion')->nullable();
            $table->string('tituloaccion')->nullable();
            $table->string('acciones')->nullable();
            $table->date('fechadeacciones')->nullable();
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
        Schema::dropIfExists('observacions');
    }
};
