<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Crear los roles por defecto
        Role::factory()->admin()->create();
        Role::factory()->assistant()->create();
        Role::factory()->user()->create();

        // Crear un usuario con un rol específico
        User::factory()->create([
            'name' => 'Willy',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Cambiar 'password' por la contraseña deseada
            'role_id' => Role::where('role', 'Admin')->first()->id,
            'status' => 'T',
            'is_active' => 'T',
        ]);
    }
}