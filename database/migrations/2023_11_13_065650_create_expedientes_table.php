<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            //$table->date('fechadeingreso')->nullable();
            //$table->string('codigoverificacion')->nullable();
            //$table->date('fecharevision')->nullable();

            $table->unsignedBigInteger('awkicliente_id')->nullable();
            $table->foreign('awkicliente_id')->references('id')->on('awkiclientes')->onDelete('cascade');

            $table->unsignedBigInteger('awkitienda_id')->nullable();
            $table->foreign('awkitienda_id')->references('id')->on('awkitiendas')->onDelete('cascade');

            $table->unsignedBigInteger('awkizona_id')->nullable();
            $table->foreign('awkizona_id')->references('id')->on('awkizonas')->onDelete('cascade');

            $table->unsignedBigInteger('tipodedocumento_id')->nullable();
            $table->foreign('tipodedocumento_id')->references('id')->on('tipodedocumentos')->onDelete('cascade');

            $table->string('numdocumento')->nullable();

            $table->date('fechaventa')->nullable();
            $table->date('fecharecepcion')->nullable();
            //$table->string('estadocivil')->nullable();
            $table->string('pagoadministrativo')->nullable();


            $table->unsignedBigInteger('tipodeventa_id')->nullable();
            $table->foreign('tipodeventa_id')->references('id')->on('tipodeventas')->onDelete('cascade');

            $table->string('montodelacompra')->nullable();

            $table->unsignedBigInteger('marca_id')->nullable();
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');

            $table->unsignedBigInteger('modello_id')->nullable();
            $table->foreign('modello_id')->references('id')->on('modellos')->onDelete('cascade');


            $table->string('chasis')->nullable();
            $table->string('motor')->nullable();

            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

            $table->unsignedBigInteger('anio_id')->nullable();
            $table->foreign('anio_id')->references('id')->on('anios')->onDelete('cascade');

            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');

            $table->string('dua')->nullable();
            $table->string('item')->nullable();
            $table->string('certificado')->nullable();
            $table->string('archivocertificado')->nullable();

            $table->unsignedBigInteger('oficinaregistral_id')->nullable();
            $table->foreign('oficinaregistral_id')->references('id')->on('oficinaregistrals')->onDelete('cascade');

            $table->date('fechaingreso')->nullable();

            $table->string('titulo')->nullable();
            $table->string('codigodeverificacion')->nullable();

            $table->string('recibo')->nullable();
            $table->string('importe')->nullable();

            $table->unsignedBigInteger('statussunarp_id')->nullable();
            $table->foreign('statussunarp_id')->references('id')->on('statussunarps')->onDelete('cascade');

            $table->string('tarjetadepropiedad')->nullable();
            $table->string('cargoenvio')->nullable();
            $table->string('numerodeplaca')->nullable();

            $table->date('fechadeenvio')->nullable();
            $table->string('guiaderemision')->nullable();
            $table->string('statusfinal')->nullable();


            $table->unsignedBigInteger('legalizacion_id')->nullable();
            $table->foreign('legalizacion_id')->references('id')->on('legalizacions')->onDelete('cascade');

            $table->unsignedBigInteger('statusfinal_id')->nullable();
            $table->foreign('statusfinal_id')->references('id')->on('statusfinals')->onDelete('cascade');


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
