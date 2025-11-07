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
        Schema::table('users', function (Blueprint $table) {
            // Adiciona a nossa nova coluna 'role'
            // O 'default('user')' garante que qualquer novo
            // registo seja um utilizador normal por defeito.
            $table->string('role')->default('user')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // O que fazer se precisarmos de reverter (rollback)
            $table->dropColumn('role');
        });
    }
};