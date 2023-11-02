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
        Schema::create('pacote_servicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_pacote");
            $table->foreign("id_pacote")->references('id')->on('pacotes');
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
        Schema::dropIfExists('pacote_servicos');
    }
};
