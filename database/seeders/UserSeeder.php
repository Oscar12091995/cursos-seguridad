<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name'=>'Oscar Mario',
            'apellidos' =>'Enriquez Lazcano',
            'email'=>'quike0114@gmail.com',
            'rfc' => 'EILO950912957',
            'password'=>bcrypt('12345678'),
            'telefono'=>'2141090',
            'puesto' => 'Mantenimiento',
            'curp' => 'EILO950912HNLNZS04',
            'empresa' => 'LOREM',
            'ocupacion' => 'Obrero General',
            'rep-legal' => 'Luis',
            'rep-trabajador' => 'roberto',
            
        ]);
        $user->assignRole('Admin');
       

        User::factory(2)->create();

     
    }
}
