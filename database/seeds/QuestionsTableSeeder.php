<?php

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\CQuestion;
use App\Models\QADetail;
use Illuminate\Support\Facades\Hash;
use App\Models\Answer;
use Faker\Factory as Faker;



class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $questions = array(
            [
                'question_name' => '¿Qué es patología?',
                'state_id' => '1',
                'name' => '1'

            ],
            [
                'question_name' => '¿Qué es POA?',
                'state_id' => '1',
                'name' => '4'
            ],
            [
                'question_name' => '¿Qué es Compentencia?',
                'state_id' => '1',
                'name' => '3'
            ], 
            [
               'question_name' => '¿Qué es Producto?',
                'state_id' => '1',
                'name' => '2'
            ]
        );
        $questionDetail = array(

            [
                'question_id' => '1',
                'answer_id' => '4'
            ],
            [
                'question_id' => '1',
                'answer_id' => '1'
            ],
            [
                'question_id' => '1',
                'answer_id' => '2'
            ],
            [
                'question_id' => '1',
                'answer_id' => '3'
            ],
            [
                'question_id' => '2',
                'answer_id' => '12'
            ],
            [
                'question_id' => '2',
                'answer_id' => '5'
            ],
            [
                'question_id' => '2',
                'answer_id' => '6'
            ],
            [
                'question_id' => '2',
                'answer_id' => '7'
            ],
            [
                'question_id' => '3',
                'answer_id' => '8'
            ],
            [
                'question_id' => '3',
                'answer_id' => '9'
            ],
            [
                'question_id' => '3',
                'answer_id' => '10'
            ],
            [
                'question_id' => '4',
                'answer_id' => '13'
            ],
            [
                'question_id' => '4',
                'answer_id' => '14'
            ],
            [
                'question_id' => '4',
                'answer_id' => '15'
            ],
            [
                'question_id' => '4',
                'answer_id' => '16'
            ],
            [
                'question_id'  => '3',
                'answer_id' => '11'             
            ]

        );
        foreach ($questions as $value ) {
            
            $question = new Question;
            $question->question_name = $value['question_name'];            
            $question->state_id = $value['state_id'];
            $question->cquestion_id = $value['name'];
            $question->save();
            
        }
        foreach ($questionDetail as $value ) {
            
            $questiondl = new QADetail;
            $questiondl->question_id = $value['question_id'];
            $questiondl->answer_id = $value['answer_id'];            
            $questiondl->save();
            
        }
        for ($i = 1; $i <= 16; $i++) {
            
            $answer = new Answer;
            $answer->name = $faker->sentence($nbWords = 6, $variableNbWords = true);  
        if ($i === 4 || $i === 8 || $i === 12 || $i === 16) {
                $answer->state_id = 4;
                $answer->puntos = 5;
            }else{
                $answer->state_id = 5;
                $answer->puntos = 0;
            }     
                $answer->save();    
        }
    }
}
