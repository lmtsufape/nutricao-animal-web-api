<?php

namespace Database\Factories;

use App\Models\Breed;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\QueryException;

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

        $tipos = ['grande porte','pequeno porte'];
        return [
            'type' =>  $tipos[fake()->numberBetween(0,sizeof($tipos)-1)] ,
            'user_id' =>1 
        ];
    }
}
