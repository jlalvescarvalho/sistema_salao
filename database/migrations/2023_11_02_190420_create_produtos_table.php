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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string("codbarra")->nullable();
            $table->string("descricao");
            $table->string("un")->nullable();
            $table->float("precocusto")->nullable();
            $table->float("precovenda");
            $table->float("estoqueinicial")->nullable();
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
        Schema::dropIfExists('produtos');
    }
};
