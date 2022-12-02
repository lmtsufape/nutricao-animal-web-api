<?php

namespace Database\Factories;

use App\Models\Breed;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Breed>
 */
class BreedFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Breed::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        $especie = ['cat','dog'];
        return [
            'name' => fake()->name() ,
            'type' =>  fake()->name() ,
            'species' => $especie[fake()->numberBetween(0,1)],
            'user_id' =>1 ,
        ];
    }
}
