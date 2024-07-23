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
        Schema::table('servicios_cotizaciones', function (Blueprint $table) {
            $table->dropColumn('dimenciones');
            $table->dropColumn('price');

            $table->string('dimenciones_cm')->nullable();
            $table->string('dimenciones_largo')->nullable();
            $table->string('dimenciones_ancho')->nullable();

            $table->string('precio_cm')->nullable();
            $table->string('total_precio_cm')->nullable();
            $table->string('material')->nullable();
            $table->string('utilidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicios_cotizaciones', function (Blueprint $table) {
            //
        });
    }
};
