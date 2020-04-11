<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\Challenge;

class ChallengeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $challenges = array(
            [
                'name' => 'Lorem ipsum dolor sit amet consectetur',
                'users' => '[2,3,4,5]',
                'subcategories' => '[1,2,3,4]',
                'number_questions' => '10',
                'state_id' => '1',
                'user_id' => '2'


            ],
            [
                'name' => 'Aliquam et facilisi dapibus',
                'users' => '[2,3,4,5]',
                'subcategories' => '[1,2,3,4]',
                'number_questions' => '10',
                'state_id' => '1',
                'user_id' => '2'

            ],
            [
                'name' => 'vulputate pretium ante non lacus',
                'users' => '[2,3,4,5]',
                'subcategories' => '[1,2,3,4]',
                'number_questions' => '10',
                'state_id' => '1',
                'user_id' => '2'

            ], 
            [
               'name' => 'condimentum senectus',
                'users' => '[2,3,4,5]',
                'subcategories' => '[1,2,3,4]',
                'number_questions' => '10',
                'state_id' => '1',
                'user_id' => '2'

            ]
        );
        foreach ($challenges as $value ) {
            $end_ch = '2020-07-07' ;
            $challenge = new Challenge;
            $challenge->name = $value['name'];            
            $challenge->users = $value['users'];
            $challenge->subcategories = $value['subcategories'];
            $challenge->number_questions = $value['number_questions'];
            $challenge->state_id = $value['state_id'];
            $challenge->user_id = $value['user_id'];
            $start_date = new \DateTime();
            $challenge->start_date = $start_date;
            $challenge->end_date = $end_ch;
            $challenge->save();
            
        }
    }
}
