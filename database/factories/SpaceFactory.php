<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Space;
class SpaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(),
            'min_reservation_length' => $this->faker->numberBetween(1, 6),
            'max_reservation_length' => $this->faker->numberBetween(7, 24),
            
            'min_reservation_length_unit' => 'hours',
            'max_reservation_length_unit' => 'hours',
            'reservation_length_limit_unit' => 'hours',
            'cancel_before_per' => 'hours',
            'make_reservations_public' => 'T'
        ];
    }
}
