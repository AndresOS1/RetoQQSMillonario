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
        Schema::create('cuestionario_has_preguntas', function (Blueprint $table) {
            $table->id('id_cuestionario_has_preguntas');
            $table->unsignedBigInteger('preguntas_id');
            $table->unsignedBigInteger('cuestionario_id');

            $table->foreign('preguntas_id')->references('id_preguntas')->on('preguntas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cuestionario_id')->references('id_game')->on('game')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('cuestionario_has_preguntas');
    }
};
