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
        Schema::create('awkirepresentadas', function (Blueprint $table) {
            $table->id();
            $table->string('razonsocial')->unique();
            $table->string('ruc', 11)->unique();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('movil')->nullable();
            $table->boolean('state')->default(true);
            $table->text('nota1')->nullable();
            $table->text('nota2')->nullable();

            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('awkirepresentadas');
    }
};
