<?php

namespace Database\Factories;

use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Food::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'moisture' =>  fake()->numberBetween(1,400) ,
            'energetic_value' =>fake()->numberBetween(1,400) ,
            'protein_value' =>fake()->numberBetween(1,400) ,
            'lipids' =>fake()->numberBetween(1,400),
            'carbohydrates' =>fake()->numberBetween(1,400),
            'calcium' =>fake()->numberBetween(1,400),
            'fiber' =>fake()->numberBetween(1,400),
            'user_id' => 1
        ];
    }
}
