<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;

class LinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $lines = array(
            [
                'name' => 'Test Line One',
                'description' => 'Lorem ipsum dolores it.',
                'user' => '["1","2","3","4","5","6","7","8","9"]',
                'subcategory' => '["1","2","3","4"]'
            ]
        );
        foreach ($lines as $value ) {
            
            $line = new Category;
            $line->name = $value['name'];            
            $line->description = $value['description'];
            $line->user = $value['user'];
            $line->subcategory = $value['subcategory'];
            $line->save();
            
        }
    }
}
