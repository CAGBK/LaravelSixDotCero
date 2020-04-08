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
use App\Models\State;
use App\Models\ChallengeUser;
use jeremykenedy\LaravelRoles\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Notifications\RepliedToThread;
use Auth;


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
    public function ruleta(Request $request, $id)
    {
        $challenge = Challenge::find($id);
        $cquestions = CQuestion::all();
        $points = ChallengeUser::where('challenge_id','=',$id)->where('user_id','=', Auth()->user()->id)->get();
        return View::make('challenge/ruleta', compact('cquestions','challenge','points'));
    }

    public function questionGame(Request $request, $id, $challenge_id)
    {
        $faker = Faker::create();
        $challenge = Challenge::find($challenge_id);
        $questions = Question::select('id')->where('cquestion_id','=',$id)->get();
        $points = ChallengeUser::select('id','number_question','challenge_id','user_id')->where('challenge_id','=',$challenge_id)->where('user_id','=', Auth()->user()->id)->first();
        $points->number_question = $points->number_question + 1;
        $points->save();
        $random_question = $faker->randomElement($questions);
        $question = Question::find($random_question);
        return View::make('challenge.preguntas', compact('question','challenge'));
    }

    public function byLinea($id)
    {
        dd(Category::find($id));		
    }
    
    public function anwers(Request $request, $id,$challenge_id)
    {
        $ansnwer = Answer::find($id);
        $points = ChallengeUser::select('id','score')->where('challenge_id','=',$challenge_id)->where('user_id','=', Auth()->user()->id)->first(); 
        $points->score = $points->score + $ansnwer->puntos;
        $points->save();
        if ($ansnwer->state_id === 4) {
            return redirect()->route('game',$challenge_id)->with('correcto','Su respuesta fue correta!');
        }
        elseif ($ansnwer->state_id === 5)
        {
            return redirect()->route('game',$challenge_id)->with('fallo','Su respuesta fue incorrecta!');
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
        $challenge->user_id = Auth()->user()->id;
        $challenge->end_date = $newDate;
        $start_date = new \DateTime();
        $challenge->start_date = $start_date;
        $challenge->save();
        $challenge = Challenge::all();
        $challengeid = $challenge->last(); 
        $resultadoJson = json_decode($jsonUsers, true);
        
        foreach($resultadoJson as $id_user ){
            $detail_ch = new ChallengeUser;
            $detail_ch->user_id = $id_user;
            $detail_ch->challenge_id = $challengeid->id;
            $detail_ch->score = 0;
            $detail_ch->number_question = 0;
            $detail_ch->save();
            $challengeNotify = Challenge::find($challengeid->id);
            $user = Auth::user();
            User::find($id_user)->notify(new RepliedToThread($challengeNotify,$user));
        }

    
        return redirect('challenge-list');
    }
}
