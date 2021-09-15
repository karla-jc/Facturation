<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id('id_medico');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('observacion');
            $table->unsignedBigInteger('especialidad_id');
            $table->timestamps();

            $table->foreign('especialidad_id')->references('id_especialidad')->on('especialidads');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}
