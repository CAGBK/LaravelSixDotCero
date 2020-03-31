<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Question;
use Faker\Factory as Faker;
use App\Models\Subcategory;
use App\Models\CQuestion;
use App\Models\User;
use jeremykenedy\LaravelRoles\Models\Role;


class DesafiosController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users= User::all();
        $data = User::paginate(8);
    	$categories= Category::all();
    	$subcategories= Subcategory::all();
        return View::make('challenge/index', compact('users','categories','subcategories', 'data'));
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
}
