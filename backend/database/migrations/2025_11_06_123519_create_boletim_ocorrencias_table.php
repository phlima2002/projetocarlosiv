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
        Schema::create('boletins_ocorrencia', function (Blueprint $table) {
            $table->id();

            // Dados do Comunicante
            $table->string('comunicante_nome');
            $table->date('comunicante_data_nasc');
            $table->string('comunicante_cpf');
            $table->text('comunicante_endereco');
            $table->string('comunicante_telefone');

            // Dados do Fato
            $table->date('fato_data');
            $table->time('fato_hora');
            $table->text('fato_local');
            $table->longText('fato_descricao'); // Usamos longText para descrições longas

            // Testemunhas
            $table->string('houve_testemunhas'); // 'sim' ou 'nao'
            $table->text('testemunhas_info')->nullable(); // .nullable() permite que este campo seja vazio

            // Agressor
            $table->string('agressor_nome')->nullable();
            $table->string('agressor_vinculo')->nullable();
            $table->text('agressor_descricao')->nullable();

            // Medidas Protetivas (JSON)
            // A melhor forma de salvar um objeto {chave: valor} é usando o tipo JSON
            $table->json('medidas_protetivas');

            $table->timestamps(); // Adiciona created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boletins_ocorrencia');
    }
};
