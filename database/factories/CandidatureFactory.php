<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidatureFactory extends Factory
{
    public function definition(): array
    {
        return [

            'offer_id'=>Offer::factory(),

            'user_id'=>User::factory(),

            'message'=>fake()->sentence(),

            'status'=>'pending'

        ];
    }
}