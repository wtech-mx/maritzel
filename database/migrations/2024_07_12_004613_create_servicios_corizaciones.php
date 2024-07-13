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
            $table->unsignedBigInteger('id_notas_servicios');
            $table->foreign('id_notas_servicios')
                ->references('id')->on('cotizaciones')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_servicios');
            $table->foreign('id_servicios')
                ->references('id')->on('servicios')
                ->inDelete('set null');
            $table->string('producto')->nullable();
            $table->string('dimenciones')->nullable();
            $table->string('price')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('descuento')->nullable();
            $table->string('total')->nullable();
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
