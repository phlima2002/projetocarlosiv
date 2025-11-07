<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Procura por 'admin@admin.com', se não encontrar, cria.
        User::updateOrCreate(
            [
                'email' => 'admin@admin.com'
            ],
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin'), // Senha é 'admin'
                'role' => 'admin' // A permissão é 'admin'
            ]
        );
    }
}