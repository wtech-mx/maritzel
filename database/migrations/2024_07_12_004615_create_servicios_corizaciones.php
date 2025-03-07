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
        Schema::create('servicios_cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nota_cotizacion');
            $table->foreign('id_nota_cotizacion')
                ->references('id')->on('cotizaciones')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_registro');
            $table->foreign('id_registro')
                ->references('id')->on('registro_cotizacion')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_servicios');
            $table->foreign('id_servicios')
                ->references('id')->on('servicios')
                ->inDelete('set null');

            $table->string('cantidad')->nullable();
            $table->string('dimenciones')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('precio')->nullable();
            $table->string('total_precio')->nullable();
            $table->string('mano_obra')->nullable();
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
        Schema::dropIfExists('servicios_corizaciones');
    }
};
