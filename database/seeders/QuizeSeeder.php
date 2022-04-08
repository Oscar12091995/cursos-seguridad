<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quize;

class QuizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quize::factory(1)->create();
    }
}
