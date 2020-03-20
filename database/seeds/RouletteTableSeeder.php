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
                'color' => '#6cbbcb'
            ],
            [
                'name' => 'Producto',
                'color' => '#8db81b'
            ],
            [
                'name' => 'Competencia',
                'color' => '#f51d3f'
            ], 
            [
                'name' => 'POA',
                'color' => '#f7c100'
            ]
        );
       
        foreach ($names as $value ) {
            
            $cquestion = new CQuestion;
            $cquestion->name = $value['name'];            
            $cquestion->color = $value['color'];
            $cquestion->save();
            
        }

    }
}
