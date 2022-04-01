<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\This;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Este metodo crea una carpeta para guardar las imagenes de los cursos
        Storage::makeDirectory('courses');
        
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(QuizeSeeder::class);
        $this->call(QuestionSeeder::class);  
        $this->call(AnswerSeeder::class);   
        $this->call(ResultSeeder::class); 
    }
}
