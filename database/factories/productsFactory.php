<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class productsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'products_names' => $this->faker->firstName($gender = null),
            'products_img' => $this->faker->url(),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'Prefecture' => $this->faker->city(),
            'url' => $this->faker->url()
        ];
    }
}
