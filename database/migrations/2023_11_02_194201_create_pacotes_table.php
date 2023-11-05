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
        Schema::create('pacotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_servico");
            $table->string("nome", 50);
            $table->string("descricao")->nullable();
            $table->float("valor", 8, 2)->unsigned();
            $table->unsignedTinyInteger("qtd_sessoes");
            $table->unsignedTinyInteger("validade");
            $table->timestamps();
            $table->foreign("id_servico")->references('id')->on('servicos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacotes');
    }
};
