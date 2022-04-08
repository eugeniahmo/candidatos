<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('ApPaterno',45);
            $table->string('ApMaterno',45);
            $table->string('Nombres',60);
            $table->string('Domicilio',150);
            $table->string('Telefono',11);
            $table->string('Email',150);
            $table->string('Acta');
            $table->string('INE');
            $table->bigInteger('representante_id')->unsigned();
            $table->timestamps();
            $table->foreign('representante_id')->references('id')->on('categorias');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatos');
    }
}
