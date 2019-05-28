<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_espaco');
            $table->integer('id_curso');
            $table->integer('id_disciplina');
            $table->integer('id_professor');
            $table->string('semestre', 50);
            $table->date('data');
            $table->time('horario_inicio');
            $table->time('horario_final');
            $table->enum('status', ['aprovado', 'reprovado', 'aguardando'])->default('aguardando');
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
        Schema::dropIfExists('solicitacaos');
    }
}
