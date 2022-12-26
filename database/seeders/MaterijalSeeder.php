<?php

namespace Database\Seeders;

use App\Models\Materijal;
use Illuminate\Database\Seeder;

class MaterijalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materijal::create([
            'materijal' => 'Belo zlato'
        ]);

        Materijal::create([
            'materijal' => 'Zuto zlato'
        ]);

        Materijal::create([
            'materijal' => 'Srebro'
        ]);


    }
}
