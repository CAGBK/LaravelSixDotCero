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
use Carbon\Carbon;


class DesafiosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $users= User::all();
        $data = User::paginate(8);
        $id = Auth::user()->id;
        $categories= Category::all();
        foreach ($categories as $key => $value) {
            $struser = json_decode($value->user);
            $strbrands = json_decode($value->subcategory);
            if (in_array($id, $struser)) 
                {   
                    $linesbyuser[] = $value->id;
                    $resultado = [];
                    foreach($linesbyuser as $line){
                        $categorylines = Category::find($line);
                        $strbrandsusr = json_decode($categorylines->subcategory);
                        $resultado = array_merge($resultado, $strbrandsusr); 
                    }
                    $subcategories = Subcategory::whereIn("id", $resultado)->get();
                }
            }
        return View::make('challenge/index', compact('users','categories','subcategories', 'data', 'states'));
    }
    public function ruleta(Request $request, $id)
    {
        $points = ChallengeUser::select('id','number_question','challenge_id','user_id','state_id')->where('challenge_id','=',$id)->where('user_id','=', Auth()->user()->id)->first();
        if ($points->state_id != 2) 
        {
            $challenge = Challenge::find($id);
            $cquestions = CQuestion::all();
            $points = ChallengeUser::where('challenge_id','=',$id)->where('user_id','=', Auth()->user()->id)->get();
            return View::make('challenge/ruleta', compact('cquestions','challenge','points'));
        }
        $challenges = Challenge::all();
        $users = User::all();
        $subcategories = Subcategory::all();
        return View::make('challenge.list', compact('challenges','users', 'subcategories'));
    }

    public function prueba(Request $request, $id)
    {
        /*Termino el tiempo
        $challenges = Challenge::all();
        $date = Carbon::now()->format('Y-m-d');
        foreach ($challenges as $challenge) {
            if($date === $challenge->end_date)
            {
                $stateChallenge = Challenge::find($challenge->id);
                $stateChallenge->state_id = 2;
                $stateChallenge->save();
                $userChallenges = json_decode($stateChallenge->users);
                foreach ($userChallenges as $userChallenge) 
                {
                    $stateChallengeDetail = ChallengeUser::where('challenge_id',$stateChallenge->id)->where('user_id', $userChallenge)->first();
                    $stateChallengeDetail->state_id = 2;
                    $stateChallengeDetail->save(); 
                }
            }
        }*/
        /*
        Ya todos los usuarios terminaron
        $challenges = Challenge::where('state_id','!=',2)->get();
        foreach ($challenges as $challenge) 
        {
            $userChallenges = json_decode($challenge->users);
            foreach ($userChallenges as $user) {
                $stateChallengeDetail = ChallengeUser::where('challenge_id',$challenge->id)->where('user_id', $user)->first();
                $array[] = $stateChallengeDetail->state_id;
            }
            $stateFinish[] = 2;
            $challengeEnded = array_diff(array_unique($array),$stateFinish);         
            if(empty($challengeEnded)) 
            {
                $challengeFinish = Challenge::find($challenge->id);
                $challengeFinish->state_id = 2;
                $challengeFinish->save();
            }
        }*/
    }

    public function questionGame(Request $request, $id, $challenge_id)
    {
        $points = ChallengeUser::select('id','number_question','challenge_id','user_id','state_id')->where('challenge_id','=',$challenge_id)->where('user_id','=', Auth()->user()->id)->first();
        if ($points->state_id != 2) {
            $faker = Faker::create();
            $challenge = Challenge::find($challenge_id);
            $questions = Question::select('id')->where('cquestion_id','=',$id)->get();
            $points->number_question = $points->number_question + 1;
            if ($points->number_question === 1)
            {
                $points->state_id = 3;
            }
            if($challenge->number_questions == $points->number_question)
            {
                $points->state_id = 2;
            }
            $points->save();
            $random_question = $faker->randomElement($questions);
            $question = Question::find($random_question);
            return View::make('challenge.preguntas', compact('question','challenge'));
        }
        $challenges = Challenge::all();
        $users = User::all();
        $subcategories = Subcategory::all();
        return View::make('challenge.list', compact('challenges','users', 'subcategories'));
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

        dd($request);

        $jsonUsers = json_encode($request->check_user);
        $jsonBrands = json_encode($request->check_subcategory);
        $challenge = new Challenge;
        $challenge->name = $request->name;
        $challenge->users = $jsonUsers;
        $challenge->subcategories = $jsonBrands;
        $challenge->number_questions = $request->number_questions;
        $challenge->state_id = $request->state_id;
        $challenge->user_id = Auth()->user()->id;
        $challenge->end_date = Carbon::parse($request->end_date)->format('Y-m-d');;
        $challenge->start_date = Carbon::now()->format('Y-m-d');
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
            $detail_ch->state_id = 1;
            $detail_ch->save();
            $challengeNotify = Challenge::find($challengeid->id);
            $user = Auth::user();
            User::find($id_user)->notify(new RepliedToThread($challengeNotify,$user));
        }

    
        return redirect('challenge-list');
    }
}
