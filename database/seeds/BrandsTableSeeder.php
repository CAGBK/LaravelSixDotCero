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
                'question' => '["1"]',
                'subcategory_image' => "/images/hospital.png",
                'color_brand' => "#6cbbcb"

            ],
            [
                'name' => 'Sinalgen',
                'description' => 'Lorem ipsum dolores it.',
                'question' => '["2"]',
                'subcategory_image' => "/images/medicine.png",
                'color_brand' => "#8db81b"
            ],
            [
                'name' => 'Palexis',
                'description' => 'Lorem ipsum dolores it.',
                'question' => '["3"]',
                'subcategory_image' => "/images/tablet.png",
                'color_brand' => "#f51d3f"
            ], 
            [
               'name' => 'Versatis',
                'description' => 'Lorem ipsum dolores it.',
                'question' => '["4"]',
                'subcategory_image' => "/images/drug.png",
                'color_brand' => "#f7c100"
            ],
            [
                'name' => 'Lorem',
                 'description' => 'Lorem ipsum dolores it.',
                 'question' => '["4"]',
                 'subcategory_image' => "/images/drug.png",
                 'color_brand' => "#f7c100"
            ],
            [
                'name' => 'Loremdolores',
                 'description' => 'Lorem ipsum dolores it.',
                 'question' => '["4"]',
                 'subcategory_image' => "/images/tablet.png",
                 'color_brand' => "#f51d3f"
             ]
             ,
            [
                'name' => 'Et em do',
                 'description' => 'Lorem ipsum dolores it.',
                 'question' => '["4"]',
                 'subcategory_image' => "/images/medicine.png",
                 'color_brand' => "#8db81b"
            ],
            [
                'name' => 'Quent est do',
                 'description' => 'Lorem ipsum dolores it.',
                 'question' => '["4"]',
                 'subcategory_image' => "/images/hospital.png",
                 'color_brand' => "#6cbbcb"
             ]
             ,
             [
                 'name' => 'Et em do',
                  'description' => 'Lorem ipsum dolores it.',
                  'question' => '["4"]',
                  'subcategory_image' => "/images/medicine.png",
                  'color_brand' => "#8db81b"
             ],
             [
                 'name' => 'Quent est do',
                  'description' => 'Lorem ipsum dolores it.',
                  'question' => '["4"]',
                  'subcategory_image' => "/images/hospital.png",
                  'color_brand' => "#6cbbcb"
              ]
             
        );
        foreach ($brands as $value ) {
            
            $brand = new SubCategory;
            $brand->name = $value['name'];            
            $brand->description = $value['description'];
            $brand->question = $value['question'];
            $brand->subcategory_image = $value['subcategory_image'];
            $brand->color_brand = $value['color_brand'];
            $brand->save();
            
        }
    }
}
