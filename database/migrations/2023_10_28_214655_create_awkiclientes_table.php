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
        Schema::create('awkiclientes', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->nullable();
            $table->string('nombres')->nullable();
            $table->string('apellidopaterno')->nullable();
            $table->string('apellidomaterno')->nullable();
            $table->boolean('state')->default(true);

            $table->unsignedBigInteger('awkirepresentada_id')->nullable();
            $table->foreign('awkirepresentada_id')->references('id')->on('awkirepresentadas')->onDelete('cascade');

            $table->unsignedBigInteger('awkizona_id')->nullable();
            $table->foreign('awkizona_id')->references('id')->on('awkizonas')->onDelete('cascade');

            $table->unsignedBigInteger('awkitienda_id')->nullable();
            $table->foreign('awkitienda_id')->references('id')->on('awkitiendas')->onDelete('cascade');
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
        Schema::dropIfExists('awkiclientes');
    }
};
