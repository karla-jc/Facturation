<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->integer('cantidad');
            $table->text('descripcion');
            $table->double('descuento_unitario', 8, 2);
            $table->double('precio_unitario', 8, 2);
            $table->double('total', 8, 2);
            $table->unsignedBigInteger('factura_id');
            $table->unsignedBigInteger('servicio_id')->nullable();
            $table->timestamps();

            $table->foreign('factura_id')->references('id_factura')->on('facturas');
            $table->foreign('servicio_id')->references('id_servicio')->on('servicios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles');
    }
}
