<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Price::create([
            'name' => 'Gratis',
            'value' => 0
        ]);
        Price::create([
            'name' => '$50 MXN',
            'value' => 50
        ]);
        Price::create([
            'name' => '$100 MXN',
            'value' => 100
        ]);

    }
}
