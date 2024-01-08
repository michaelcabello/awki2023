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

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('awkicliente_id')->nullable();
            $table->foreign('awkicliente_id')->references('id')->on('awkiclientes')->onDelete('set null');

            $table->unsignedBigInteger('awkitienda_id')->nullable();
            $table->foreign('awkitienda_id')->references('id')->on('awkitiendas')->onDelete('set null');

            $table->unsignedBigInteger('awkizona_id')->nullable();
            $table->foreign('awkizona_id')->references('id')->on('awkizonas')->onDelete('set null');

            $table->unsignedBigInteger('tipodedocumento_id')->nullable();
            $table->foreign('tipodedocumento_id')->references('id')->on('tipodedocumentos')->onDelete('set null');

            $table->string('numdocumento')->nullable();

            $table->date('fechaventa')->nullable();
            $table->date('fecharecepcion')->nullable();
            //$table->string('estadocivil')->nullable();
            $table->string('pagoadministrativo')->nullable();
            $table->text('observacion')->nullable();


            $table->unsignedBigInteger('tipodeventa_id')->nullable();
            $table->foreign('tipodeventa_id')->references('id')->on('tipodeventas')->onDelete('set null');

            $table->string('montodelacompra')->nullable();

            $table->unsignedBigInteger('marca_id')->nullable();
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('set null');

            $table->unsignedBigInteger('modello_id')->nullable();
            $table->foreign('modello_id')->references('id')->on('modellos')->onDelete('set null');


            $table->string('chasis')->nullable();
            $table->string('motor')->nullable();

            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('set null');

            $table->unsignedBigInteger('anio_id')->nullable();
            $table->foreign('anio_id')->references('id')->on('anios')->onDelete('set null');

            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');

            $table->string('dua')->nullable();
            $table->string('item')->nullable();
            $table->string('certificado')->nullable();
            $table->string('archivocertificado')->nullable();

            $table->unsignedBigInteger('oficinaregistral_id')->nullable();
            $table->foreign('oficinaregistral_id')->references('id')->on('oficinaregistrals')->onDelete('set null');

            $table->date('fechaingreso')->nullable();

            $table->string('titulo')->nullable();
            $table->string('codigodeverificacion')->nullable();

            $table->string('recibo')->nullable();
            $table->string('importe')->nullable();

            $table->unsignedBigInteger('statussunarp_id')->nullable();
            $table->foreign('statussunarp_id')->references('id')->on('statussunarps')->onDelete('set null');

            $table->string('tarjetadepropiedad')->nullable();
            $table->string('cargoenvio')->nullable();
            $table->string('numerodeplaca')->nullable();

            $table->date('fechadeenvio')->nullable();
            $table->string('guiaderemision')->nullable();
            $table->string('statusfinal')->nullable();

            $table->date('fechaderevision')->nullable();
            $table->string('confirmaciondeplaca')->nullable();
            $table->string('placa')->nullable();
            $table->string('codigoplaca')->nullable();
            $table->string('monto')->nullable();
            $table->date('fechadepago')->nullable();
            $table->string('facturaapp')->nullable();


            $table->string('confirmaciondeenvio')->nullable();
            $table->string('confirmaciondecobro')->nullable();
            $table->string('confirmarfindetramite')->nullable();

            $table->string('factura')->nullable();
            $table->date('fechadefacturacion')->nullable();
            /* $table->date('fechadeabonoaap')->nullable();
            $table->string('abonoaap')->nullable();
            $table->string('pendientedepago')->nullable(); */


            $table->unsignedBigInteger('legalizacion_id')->nullable();
            $table->foreign('legalizacion_id')->references('id')->on('legalizacions')->onDelete('set null');

            $table->unsignedBigInteger('statusfinal_id')->nullable();
            $table->foreign('statusfinal_id')->references('id')->on('statusfinals')->onDelete('set null');


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
