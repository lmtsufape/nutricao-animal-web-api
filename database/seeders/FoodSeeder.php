<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = ["Frutas" => ['Banana','Maça','Melancia'],
        "Carne"=>['Alcantra','Frango','Porco'], "Ração"=> ['Golden','Pedigree','Royal Canin']];
        

        foreach ($foods as $key => $food) {
            foreach ($food as $v => $value) {
                Food::factory()->create(['name' => $value, 'category'=> $key]);
            };
        }
    }
}
