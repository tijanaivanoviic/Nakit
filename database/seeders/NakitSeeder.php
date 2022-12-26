<?php

namespace Database\Seeders;

use App\Models\Nakit;
use Illuminate\Database\Seeder;

class NakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {

            Nakit::create([
                'vrstaID' => $faker->numberBetween(1,4),
                'naziv' => $faker->firstName('female'),
                'materijalID' => $faker->numberBetween(1,3), 
                'cena' => $faker->numberBetween(30,300)
            ]);
        }
    }
}
