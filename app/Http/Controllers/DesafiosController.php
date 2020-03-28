<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Question;
use Faker\Factory as Faker;
use App\Models\Subcategory;
use App\Models\Challenge;
use App\Models\Answer;
use App\Models\CQuestion;
use App\Models\User;


class DesafiosController extends Controller
{
    public function index()
    {
    	$users= User::all();
    	$categories= Category::all();
    	$subcategories= Subcategory::all();
        return View::make('challenge/index', compact('users','categories','subcategories'));
    }
    public function ruleta()
    {
        $cquestions = CQuestion::all();
        return View::make('challenge/ruleta', compact('cquestions'));
    }

    public function questionGame(Request $request, $id)
    {
        $faker = Faker::create();
        $questions = Question::select('id')->where('cquestion_id','=',$id)->get();
        $random_question = $faker->randomElement($questions);
        $question = Question::find($random_question);
        return View::make('challenge.preguntas', compact('question'));
    }

    public function byLinea($id)
    {
        dd(Category::find($id));		
    }
    public function anwers(Request $request, $id)
    {
        $ansnwer = Answer::find($id);
        if ($ansnwer->state_id === 4) {
            return redirect()->route('ruleta')->with('success','Su respuesta fue correta!');
        }
        elseif ($ansnwer->state_id === 5)
        {
            return redirect()->route('ruleta')->with('error','Su respuesta fue incorrecta!');
        }
    }
}
