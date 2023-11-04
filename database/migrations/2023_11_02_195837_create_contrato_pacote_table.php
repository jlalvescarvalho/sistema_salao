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
        Schema::create('contrato_pacote', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_pacote");
            $table->unsignedBigInteger("id_cliente");
            $table->date("data_contrato");
            $table->date("data_vencimento");
            $table->unsignedTinyInteger("qtd_sessoes");
            $table->timestamps();
            $table->foreign("id_cliente")->references("id")->on("clientes")->deleteOnDelete();
            $table->foreign("id_pacote")->references("id")->on("pacotes")->deleteOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrato_pacote');
    }
};
