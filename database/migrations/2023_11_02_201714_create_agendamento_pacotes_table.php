<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agendamento_pacotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_contrato_pacote");
            $table->dateTime("data_hora");
            $table->dateTime("data_minima_cancelamento");
            $table->time("duracao")->nullable();
            $table->enum("status", ["pendente", "concluido", "cancelado", "faltou"])->default("pendente");

            $table->string("observacao")->nullable();
            $table->dateTime("data_hora_chegada")->nullable();
            $table->dateTime("data_hora_finalizacao")->nullable();

            $table->foreign("id_contrato_pacote")->references('id')->on('contrato_pacote')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamento_pacotes');
    }
};
