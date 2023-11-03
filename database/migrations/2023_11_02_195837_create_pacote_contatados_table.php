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
        Schema::create('pacote_contatados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_pacote");
            $table->foreign("id_pacote")->references("id")->on("pacotes")->onDelete("cascade");
            $table->unsignedBigInteger("id_cliente");
            $table->foreign("id_cliente")->references("id")->on("clientes");
            $table->unsignedBigInteger("id_empresa");
            $table->foreign("id_empresa")->references("id")->on("empresas");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacote_contatados');
    }
};
