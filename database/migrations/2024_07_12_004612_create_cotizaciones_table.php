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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')
                ->references('id')->on('clients')
                ->inDelete('set null');

            $table->unsignedBigInteger('id_subcliente')->nullable();
            $table->foreign('id_subcliente')
                ->references('id')->on('subclientes')
                ->inDelete('set null');

            $table->date('fecha')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('iva_porcentaje')->nullable();
            $table->string('iva')->nullable();
            $table->string('total')->nullable();

            $table->string('dinero_recibido')->nullable();
            $table->string('restante')->nullable();
            $table->string('descuento')->nullable();

            $table->string('metodo_pago')->nullable();
            $table->string('monto')->nullable();
            $table->text('foto_pago')->nullable();
            $table->string('metodo_pago2')->nullable();
            $table->string('monto2')->nullable();
            $table->text('foto_pago2')->nullable();

            $table->string('factura')->nullable();
            $table->string('situacion_fiscal')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('rfc')->nullable();
            $table->string('cfdi')->nullable();
            $table->string('correo_fac')->nullable();
            $table->string('telefono_fac')->nullable();
            $table->string('direccion_fac')->nullable();
            $table->string('estatus_cotizacion')->nullable();

            $table->unsignedBigInteger('id_admin');
            $table->foreign('id_admin')
                ->references('id')->on('users')
                ->inDelete('set null');

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
        Schema::dropIfExists('cotizaciones');
    }
};
