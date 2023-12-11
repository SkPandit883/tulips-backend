<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\Population;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
 
        User::create([
            'name'=>'admin',
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin@123'),
            'remember_token' => Str::random(10),
        ]);
        Country::factory()
            ->count(10)
            ->has(
                City::factory()->count(10)
                    ->has(
                        Population::factory()
                    )
            )
            ->create();

    }
}
