<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Question;
use Faker\Factory as Faker;
use App\Models\Subcategory;
use App\Models\Challenge;
use App\Models\Point;
use App\Models\Answer;
use App\Models\CQuestion;
use App\Models\User;
use App\Models\State;
use App\Models\ChallengeUser;
use jeremykenedy\LaravelRoles\Models\Role;
use Illuminate\Support\Facades\DB;


class DesafiosController extends Controller
{
    public function listChallenge()
    {
        $challenges = Challenge::all();
        $users = User::all();
        $subcategories = Subcategory::all();
        return View::make('challenge.list', compact('challenges','users', 'subcategories'));
    }
    public function index()
    {
        $states = DB::table('states')
        ->select('states.id','states.state','states.color')
        ->whereBetween('states.id', [1,2])
        ->get();
        $roles = Role::all();
        $users= User::all();
        $data = User::paginate(8);
    	$categories= Category::all();
    	$subcategories= Subcategory::all();
        return View::make('challenge/index', compact('users','categories','subcategories', 'data', 'states'));
    }
    public function ruleta()
    {
        $cquestions = CQuestion::all();
        $challenge = Challenge::find(1);
        $points = Point::where('challenge_id','=',1)->get();
        return View::make('challenge/ruleta', compact('cquestions','challenge','points'));
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
        $points = Point::find(1);
        $points->score = $points->score + $ansnwer->puntos;
        $points->save();
        if ($ansnwer->state_id === 4) {
            return redirect()->route('ruleta')->with('success','Su respuesta fue correta!');
        }
        elseif ($ansnwer->state_id === 5)
        {
            return redirect()->route('ruleta')->with('error','Su respuesta fue incorrecta!');
        }
    }
    public function storeChallenge(Request $request){

       
        $dateconvert = $request->end_date; 
        $newDate = date("Y-m-d  g:i " , strtotime($dateconvert));
        $jsonUsers = json_encode($request->check_user);
        $jsonBrands = json_encode($request->check_subcategory);
        $challenge = new Challenge;
        $challenge->name = $request->name;
        $challenge->users = $jsonUsers;
        $challenge->subcategories = $jsonBrands;
        $challenge->number_questions = $request->number_questions;
        $challenge->state_id = $request->state_id;
        $challenge->end_date = $newDate;
        $start_date = new \DateTime();
        $challenge->start_date = $start_date;
        $challenge->save();
        $challenge = Challenge::all();
        $challengeid = $challenge->last(); 
        $resultadoJson = json_decode($jsonUsers, true);
        
        foreach($resultadoJson as $value ){
            $detail_ch = new ChallengeUser;
            $detail_ch->user_id = $value;
            $detail_ch->challenge_id = $challengeid->id;
            $detail_ch->score = 0;
            $detail_ch->save();
        }
    
        return redirect('challenge-list');
    }
}
