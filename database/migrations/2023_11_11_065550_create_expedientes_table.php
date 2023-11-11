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
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('numdocumento')->nullable();
            $table->date('fechaventa')->nullable();
            $table->date('fecharecepcion')->nullable();
            $table->date('fechadeingreso')->nullable();
            $table->string('titulo')->nullable();
            $table->string('numerodeplaca')->nullable();
            $table->string('codigoverificacion')->nullable();
            $table->string('recibo')->nullable();
            $table->string('monto')->nullable();
            $table->date('fecharevision')->nullable();

            $table->unsignedBigInteger('awkitienda_id')->nullable();
            $table->foreign('awkitienda_id')->references('id')->on('awkitiendas')->onDelete('cascade');

            $table->unsignedBigInteger('awkicliente_id')->nullable();
            $table->foreign('awkicliente_id')->references('id')->on('awkiclientes')->onDelete('cascade');

            $table->unsignedBigInteger('oficinaregistral_id')->nullable();
            $table->foreign('oficinaregistral_id')->references('id')->on('oficinaregistrals')->onDelete('cascade');

            $table->unsignedBigInteger('statusfinal_id')->nullable();
            $table->foreign('statusfinal_id')->references('id')->on('statusfinals')->onDelete('cascade');

            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            $table->unsignedBigInteger('legalizacion_id')->nullable();
            $table->foreign('legalizacion_id')->references('id')->on('legalizacions')->onDelete('cascade');

            $table->unsignedBigInteger('observacion_id')->nullable();
            $table->foreign('observacion_id')->references('id')->on('observacions')->onDelete('cascade');

            $table->unsignedBigInteger('tipodeventa_id')->nullable();
            $table->foreign('tipodeventa_id')->references('id')->on('tipodeventas')->onDelete('cascade');

            $table->unsignedBigInteger('tipodedocumentos_id')->nullable();
            $table->foreign('tipodedocumentos_id')->references('id')->on('tipodedocumentoss')->onDelete('cascade');

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
        Schema::dropIfExists('expedientes');
    }
};
