<?php

use Illuminate\Database\Seeder;
use App\Models\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $states = array(
            [
                'state' => 'Activo',
                'color' => '#008f39'
            ],
            [
                'state' => 'Inactivo',
                'color' => '#ff0000'
            ],
            [
                'state' => 'Pendiente',
                'color' => '#e5be01'
            ], 
            [
                'state' => 'Correcto',
                'color' => '#008f39'
            ],
            [
                'state' => 'Incorrecto',
                'color' => '#ff0000'
            ]
        );
       
        foreach ($states as $value ) {
            
            $state = new State;
            $state->state = $value['state'];            
            $state->color = $value['color'];
            $state->save();
            
        }

    }
}
