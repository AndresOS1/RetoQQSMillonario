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
        Schema::create('game', function (Blueprint $table) {
            $table->id('id_game');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('niveles_id');
            $table->unsignedBigInteger('respuesta_id');
            $table->unsignedBigInteger('preguntas_id');
      

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('niveles_id')->references('id_niveles')->on('niveles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('respuesta_id')->references('id_respuestas')->on('respuestas');
            $table->foreign('categoria_id')->references('id_categorias')->on('categorias');
            $table->foreign('preguntas_id')->references('id_preguntas')->on('preguntas')->onDelete('cascade')->onUpdate('cascade');


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
        Schema::dropIfExists('cuestionario');
    }
};
