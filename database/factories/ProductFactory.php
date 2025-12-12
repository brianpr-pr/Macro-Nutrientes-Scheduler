<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isProductDefault = random_int(0,1);

        if($isProductDefault === 0){
            return [
                'name' => fake()->name(),
                'calories' => fake()->randomFloat(2, 0, 1000),
                'product_creation_id' => random_int(1,14),
                'product_default_id' => null,
            ];
        }else{
             return [
                'name' => fake()->name(),
                'calories' => fake()->randomFloat(2, 0, 1000),
                'product_creation_id' => null,
                'product_default_id' => random_int(680,682),
            ];
        }
    }
}