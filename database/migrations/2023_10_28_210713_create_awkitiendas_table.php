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
        Schema::create('awkitiendas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('description')->nullable();
            $table->string('serief')->nullable();
            $table->string('serieb')->nullable();
            $table->string('email')->nullable();
            $table->boolean('state')->default(true);

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('user2_id')->nullable();
            $table->foreign('user2_id')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('awkizona_id')->nullable();
            $table->foreign('awkizona_id')->references('id')->on('awkizonas')->onDelete('cascade');

            $table->unsignedBigInteger('awkirepresentada_id')->nullable();
            $table->foreign('awkirepresentada_id')->references('id')->on('awkirepresentadas')->onDelete('cascade');

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
        Schema::dropIfExists('awkitiendas');
    }
};
