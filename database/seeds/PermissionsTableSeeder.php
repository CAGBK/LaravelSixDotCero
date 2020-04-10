<?php

use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*
         * Add Permissions
         *
         */
        if (Permission::where('name', '=', 'Ver lineas y marcas')->first() === null) {
            Permission::create([
                'name'        => 'Ver lineas y marcas',
                'slug'        => 'view.lines',
                'description' => 'Ver lineas y marcas',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Vista Crear Linea')->first() === null) {
            Permission::create([
                'name'        => 'Vista Crear Linea',
                'slug'        => 'view.create.line',
                'description' => 'Puede entrar a la visualizacion de crear una Linea',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Crear Linea')->first() === null) {
            Permission::create([
                'name'        => 'Crear Linea',
                'slug'        => 'create.line',
                'description' => 'Puede Crear Lineas',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Vista Editar Linea')->first() === null) {
            Permission::create([
                'name'        => 'Vista Editar Linea',
                'slug'        => 'view.edit.line',
                'description' => 'Puede entrar a la visualizacion de editar una Linea',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Editar Linea')->first() === null) {
            Permission::create([
                'name'        => 'Editar Linea',
                'slug'        => 'edit.line',
                'description' => 'Puede Editar Lineas',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Detalle de Linea')->first() === null) {
            Permission::create([
                'name'        => 'Detalle de Linea',
                'slug'        => 'detail.line',
                'description' => 'Detalle de Linea',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Vista Crear Marca')->first() === null) {
            Permission::create([
                'name'        => 'Vista Crear Marca',
                'slug'        => 'view.create.brand',
                'description' => 'Puede entrar a la visualizacion de crear una Linea',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Editar Marca')->first() === null) {
            Permission::create([
                'name'        => 'Editar Marca',
                'slug'        => 'edit.brand',
                'description' => 'Puede Editar Marca',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Crear Marca')->first() === null) {
            Permission::create([
                'name'        => 'Crear Marca',
                'slug'        => 'create.brand',
                'description' => 'Puede Crear Marcas',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Vista editar Marca')->first() === null) {
            Permission::create([
                'name'        => 'Vista editar Marca',
                'slug'        => 'view.edit.brand',
                'description' => 'Puede entrar a la visualizacion de editar una Marca',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Detalles Marca')->first() === null) {
            Permission::create([
                'name'        => 'Detalles Marca',
                'slug'        => 'detail.brand',
                'description' => 'Detalle Marca',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Ver Preguntas y Respuestas')->first() === null) {
            Permission::create([
                'name'        => 'Ver Preguntas y Respuestas',
                'slug'        => 'view.questions',
                'description' => 'Ver lista de preguntas y respuestas',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Vista Crear Pregunta')->first() === null) {
            Permission::create([
                'name'        => 'Vista Crear Pregunta',
                'slug'        => 'view.create.question',
                'description' => 'Puede entrar a la visualizacion de crear una Pregunta',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Crear Pregunta')->first() === null) {
            Permission::create([
                'name'        => 'Crear Pregunta',
                'slug'        => 'create.question',
                'description' => 'Puede Crear Preguntas',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Detalle de Preguntas')->first() === null) {
            Permission::create([
                'name'        => 'Detalle de Preguntas',
                'slug'        => 'detail.question',
                'description' => 'Detalles de Preguntas',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Vista Editar Pregunta')->first() === null) {
            Permission::create([
                'name'        => 'Vista Editar Pregunta',
                'slug'        => 'view.edit.question',
                'description' => 'Puede entrar a la visualizacion de editar una Pregunta',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Editar Pregunta')->first() === null) {
            Permission::create([
                'name'        => 'Editar Pregunta',
                'slug'        => 'edit.question',
                'description' => 'Puede Editar Preguntas',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Menu de administracion')->first() === null) {
            Permission::create([
                'name'        => 'Menu de administracion',
                'slug'        => 'menu.admin',
                'description' => 'Menu de administracion',
                'model'       => 'Permission',
            ]);
        }

        if (Permission::where('name', '=', 'Menu de Juego')->first() === null) {
            Permission::create([
                'name'        => 'Menu de Juego',
                'slug'        => 'menu.juego',
                'description' => 'Menu de Juego',
                'model'       => 'Permission',
            ]);
        }

    }
}
