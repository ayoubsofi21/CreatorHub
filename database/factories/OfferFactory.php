<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    public function definition(): array
    {
        return [

            'user_id'=>User::factory(),

            'title'=>fake()->jobTitle(),

            'description'=>fake()->paragraph(),

            'budget'=>fake()->numberBetween(1000,10000),

            'status'=>'open',

            'deadline'=>fake()->dateTimeBetween('now','+1 month')

        ];
    }
}