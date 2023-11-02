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
        Schema::create('pacotes', function (Blueprint $table) {
            $table->id();
            $table->string("descricao");
            $table->float("valor");
            $table->integer("qtdeSecoes");
            $table->string("validade");
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
        Schema::dropIfExists('pacotes');
    }
};
