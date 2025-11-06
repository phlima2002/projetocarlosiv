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
        Schema::create('denuncias_rapidas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_hora');
            $table->string('tipo_violencia');
            $table->string('e_a_vitima'); // 'sim' ou 'nao'
            $table->string('agressor_armado'); // 'sim' ou 'nao'
            $table->text('localizacao');
            $table->string('vinculo_agressor');
            $table->string('genero_agressor');
            $table->text('descricao_agressor');
            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncias_rapidas');
    }
};
