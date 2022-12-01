<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'role' => 'AdmProf',
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),

        ]);

        $this->call([
            UserSeeder::class,
            FoodSeeder::class,
            BreedSeeder::class
        ]);
    }
}
