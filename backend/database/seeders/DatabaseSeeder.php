<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // --- ADICIONE ESTA LINHA ---
        $this->call([
            AdminUserSeeder::class,
        ]);
        // --- FIM DA ADIÇÃO ---
    }
}