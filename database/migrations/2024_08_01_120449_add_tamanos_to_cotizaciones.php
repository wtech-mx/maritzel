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
            $table->text('total_iva')->nullable();
            $table->text('largo')->nullable();
            $table->text('ancho')->nullable();
            $table->text('m2')->nullable();
            $table->text('instalacion')->nullable();
            $table->text('total_instalacion')->nullable();
            $table->text('subtotal_iva')->nullable();
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
