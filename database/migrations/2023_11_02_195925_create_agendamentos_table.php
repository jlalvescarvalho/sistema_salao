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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_cliente");
            $table->unsignedBigInteger("id_servico");
            $table->dateTime("data_hora");
            $table->time("duracao")->nullable();
            $table->enum("status", ["pendente", "concluido", "cancelado", "faltou"])->default("pendente");

            $table->string("observacao")->nullable();
            $table->dateTime("data_hora_chegada")->nullable();
            $table->dateTime("data_hora_finalizacao")->nullable();

            $table->foreign("id_cliente")->references('id')->on('clientes');
            $table->foreign("id_servico")->references('id')->on('servicos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
