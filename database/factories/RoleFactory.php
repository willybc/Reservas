<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Role;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role' => $this->faker->unique()->randomElement(['Admin', 'Assistant', 'User']),
            'status' => 1,
        ];
    }

    /**
     * Define the 'admin' role state.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'Admin',
            ];
        });
    }

    /**
     * Define the 'assistant' role state.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function assistant()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'Assistant',
            ];
        });
    }

    /**
     * Define the 'user' role state.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function user()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'User',
            ];
        });
    }
}