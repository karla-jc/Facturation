<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('id_factura');
            $table->string('forma_pago');
            $table->string('observacion');
            $table->double('subtotal', 8, 2);
            $table->double('descuento_Total', 8, 2);
            $table->double('totalFactura', 8, 2);
            $table->date('fecha');
            $table->boolean('anulado');
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('medico_id');
            
            $table->timestamps();

            $table->foreign('account_id')->references('id_account')->on('accounts');
            $table->foreign('cliente_id')->references('id_cliente')->on('clientes');
            $table->foreign('medico_id')->references('id_medico')->on('medicos');
            
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}
