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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("telefone", 20)->nullable();
            $table->string("cpf", 11)->nullable();
            $table->date("data_nascimento")->nullable();
            $table->unsignedBigInteger("id_endereco")->nullable();
            $table->foreign("id_endereco")->references('id')->on('enderecos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
