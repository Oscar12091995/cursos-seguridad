<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Crear cursos',
        ]);
        Permission::create([
            'name' => 'Leer cursos',
        ]);
        Permission::create([
            'name' => 'Actualizar cursos',
        ]);
        Permission::create([
            'name' => 'Eliminar cursos',
        ]);
        Permission::create([
            'name' => 'Ver dashboard',
        ]);
        Permission::create([
            'name' => 'Crear roles',
        ]);
        Permission::create([
            'name' => 'Lista rol',
        ]);
        Permission::create([
            'name' => 'Editar roles',
        ]);
        Permission::create([
            'name' => 'Eliminar rol',
        ]);
        Permission::create([
            'name' => 'Leer usuarios',
        ]);
        Permission::create([
            'name' => 'Editar usuarios',
        ]);
        Permission::create([
            'name' => 'Crear Categorias',
        ]);
        Permission::create([
            'name' => 'Editar Categorias',
        ]);
        Permission::create([
            'name' => 'Eliminar Categorias',
        ]);
        Permission::create([
            'name' => 'Leer cuestionarios',
        ]);
        Permission::create([
            'name' => 'Crear cuestionarios',
        ]);
        Permission::create([
            'name' => 'Editar cuestionarios',
        ]);
        Permission::create([
            'name' => 'Eliminar cuestionarios',
        ]);
        Permission::create([
            'name' => 'Leer preguntas',
        ]);
        Permission::create([
            'name' => 'Crear preguntas',
        ]);
        Permission::create([
            'name' => 'Editar preguntas',
        ]);
        Permission::create([
            'name' => 'Eliminar preguntas',
        ]);
    }
}
