<?php

namespace Database\Seeders;

use App\Models\Result;
use Database\Factories\ResultFactory;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Result::factory(20)->create();
    }
}
