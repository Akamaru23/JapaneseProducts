<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RankingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rank' => $this->faker->numberBetween(1, 3),
            'Prefecture' => $this->faker->city(),
            'products_name' => $this->faker->firstName($gender = null),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'url' => $this->faker->url(),
            'products_img' => $this->faker->url()
        ];
    }
}
