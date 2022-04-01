<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Platform;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Platform::create([
            'name' => 'Yotube'
        ]);
        Platform::create([
            'name' => 'Vimeo'
        ]);
    }
}
