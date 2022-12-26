<?php

namespace Database\Seeders;

use App\Models\Vrsta;
use Illuminate\Database\Seeder;

class VrstaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vrsta::create([
            'vrsta' => 'Ogrlica'
        ]);

        Vrsta::create([
            'vrsta' => 'Narukvica'
        ]);

        Vrsta::create([
            'vrsta' => 'Prsten'
        ]);

        Vrsta::create([
            'vrsta' => 'Mindjuse'
        ]);

    
    }
}
