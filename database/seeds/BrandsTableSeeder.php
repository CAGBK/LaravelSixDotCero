<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\SubCategory;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $brands = array(
            [
                'name' => 'Adorlan',
                'description' => 'Lorem ipsum dolores it.',
                'question' => '["1"]'

            ],
            [
                'name' => 'Sinalgen',
                'description' => 'Lorem ipsum dolores it.',
                'question' => '["2"]'
            ],
            [
                'name' => 'Palexis',
                'description' => 'Lorem ipsum dolores it.',
                'question' => '["3"]'
            ], 
            [
               'name' => 'Versatis',
                'description' => 'Lorem ipsum dolores it.',
                'question' => '["4"]'
            ]
        );
        foreach ($brands as $value ) {
            
            $brand = new SubCategory;
            $brand->name = $value['name'];            
            $brand->description = $value['description'];
            $brand->question = $value['question'];
            $brand->save();
            
        }
    }
}
