<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->string("observacao");
            $table->string("data_hora");
            $table->string("duracao");
            $table->string("status");
            $table->string("descontar_session")->default("SIM");
            $table->unsignedBigInteger("id_cliente");
            $table->foreign("id_cliente")->references('id')->on('clientes');
            $table->unsignedBigInteger("id_empresa");
            $table->foreign("id_empresa")->references('id')->on('empresas');
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
