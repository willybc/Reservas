<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Space;

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

        Space::factory()->create([
            'title' => 'Aula Tanque',
            'description' => 'Aula Tanque',
            'min_reservation_length' => 1,
            'max_reservation_length' => 4,

            'min_reservation_length_unit' => 'hours',
            'max_reservation_length_unit' => 'hours',
            'reservation_length_limit_unit' => 'hours',

            'cancel_before_per' => 'hours',
            'make_reservations_public' => 'T'
        ]);
    }
}