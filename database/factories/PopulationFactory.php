<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Population>
 */
class PopulationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'city_id' => 1,
            'old_male' => rand(1000, 2000),
            'old_female' => rand(1000, 2000),
            'young_male' => rand(1000, 2000),
            'young_female' => rand(1000, 2000),
            'child_male' => rand(1000, 2000),
            'child_female' => rand(1000, 2000),

        ];
    }
}
