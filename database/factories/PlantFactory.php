<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plant>
 */
class PlantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'botanical' => fake('es_ES')->name(),
            'image' => 'resources/assets/images/calathea_korbmarante.jpeg',
            'watered_at' => fake()->datetime(),
        ];
    }
}
