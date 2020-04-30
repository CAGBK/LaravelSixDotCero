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
                'imagen' => '/images/Patologia.png'
            ],
            [
                'name' => 'Producto',
                'color' => '#8db81b',
                'imagen' => '/images/Producto2.png'
            ],
            [
                'name' => 'Competencia',
                'color' => '#f51d3f',
                'imagen' => '/images/Competencia.png'
            ], 
            [
                'name' => 'POA',
                'color' => '#f7c100',
                'imagen' => '/images/POA.png'
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
