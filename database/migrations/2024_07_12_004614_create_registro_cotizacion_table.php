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
        Schema::create('registro_cotizacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nota_cotizacion');
            $table->foreign('id_nota_cotizacion')
                ->references('id')->on('cotizaciones')
                ->inDelete('set null');

            $table->string('nombre_empresa')->nullable();
            $table->string('envio')->nullable();
            $table->string('instalacion')->nullable();
            $table->string('utilidad_porcentaje')->nullable();
            $table->string('utilidad_fijo')->nullable();
            $table->string('total_registro')->nullable();
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
        Schema::dropIfExists('registro_cotizacion');
    }
};
