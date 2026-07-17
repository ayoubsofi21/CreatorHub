<?php

namespace Database\Seeders;

use App\Models\Offer;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    public function run(): void
    {
        Offer::factory(10)
            ->create()
            ->each(function($offer){

                $offer->skills()->attach(

                    Skill::inRandomOrder()

                    ->take(rand(2,4))

                    ->pluck('id')

                );

            });
    }
}