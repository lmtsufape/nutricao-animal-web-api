<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Breed;
use Exception;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = ['Siamês','Edythe Boyle','Gladyce Oberbrunner','Augustus Watsica'];
        $dog = ['Pastor Alemão','Pitcher','Border Collie','Myrtie Funk'];
       
        foreach ($dog as $key => $value) {
            Breed::factory()->create(['name' => $value, 'species'=> 'Cachorro']);
        }
        foreach ($cat as $key => $value) {
            Breed::factory()->create(['name' => $value, 'species'=> 'Gato']);
        }

        
       
        
    }
}
