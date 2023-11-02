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
        Schema::create('agendamento_servicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_agendamento");
            $table->foreign("id_agendamento")->references('id')->on('agendamentos');
            $table->unsignedBigInteger("id_servico");
            $table->foreign("id_servico")->references('id')->on('servicos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamento_servicos');
    }
};
