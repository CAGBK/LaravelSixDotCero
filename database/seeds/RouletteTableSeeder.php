<?php

use Illuminate\Database\Seeder;
use App\Models\CQuestion;

class RouletteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = array(
            [
                'name' => 'Patología',
                'color' => '#6cbbcb',
                'imagen' => '/images/patologia.png'
            ],
            [
                'name' => 'Producto',
                'color' => '#8db81b',
                'imagen' => '/images/producto.png'
            ],
            [
                'name' => 'Competencia',
                'color' => '#f51d3f',
                'imagen' => '/images/competencia.png'
            ], 
            [
                'name' => 'POA',
                'color' => '#f7c100',
                'imagen' => '/images/poa.png'
            ]
        );
       
        foreach ($names as $value ) {
            
            $cquestion = new CQuestion;
            $cquestion->name = $value['name'];            
            $cquestion->color = $value['color'];
            $cquestion->image = $value['imagen'];
            $cquestion->save();
            
        }

    }
}
