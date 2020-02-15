<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Question;
use App\Models\ SubcategoryQuestionDetail;
use App\Models\State;
use App\Models\Answer;
use App\Models\QADetail;
use Illuminate\Support\Facades\DB;

class PreguntasRespuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        $answers = Answer::all();
        $states = State::all();
        return View::make('questionanswer/list', compact('questions','answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createQuestion()
    {

        $states = DB::table('states')
        ->select('states.id','states.state','states.color')
        ->whereBetween('states.id', [1,2])
        ->get();
        $statesanswer = DB::table('states')
        ->select('states.id','states.state','states.color')
        ->where('states.id', [4])
        ->get();
        return \View::make('questionanswer/new', compact('statesanswer', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeQuestion(Request $request)
    {
        
        $question = new Question;
        $question->question_name = $request->question;
        $question->state_id = $request->state_id;
        $question->save();
        $question = Question::all();
        $questionid = $question->last(); 
        $i = 0; 
        foreach ($request->answer as $answer1) {
            $answer = new Answer;
            $answer->name = $answer1;

            if($request->state[0] == $i){
                $answer->state_id = 4;
            }else{
                $answer->state_id = 5;
            }
            $answer->save();
            $answer = Answer::all();
            $answer_id = $answer->last();
            $qadetail = new QADetail;
            $qadetail->question_id = $questionid->id;
            $qadetail->answer_id = $answer_id->id;
            $qadetail->save();    
            $i ++;
        }
        
        
        return redirect('preguntas-respuestas');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAnswer()
    {
        $states = DB::table('states')
        ->select('states.id','states.state','states.color')
        ->whereBetween('states.id', [4,5])
        ->get();
        return \View::make('questionanswer/newanswer', compact('states'));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAnswer(Request $request)
    {
       
        
        $answer = Answer::create(['name' => $request->answer,
                                'state_id' => $request->state_id]);
        return redirect('preguntas-respuestas');
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\Response
     */
    public function createQuestionAnswer()
    {
        $questions = Question::all();
        $answers = Answer::all();
        $states = State::all();
        return \View::make('questionanswer/newquestionask',compact('questions','answers', 'states'));
    }
    public function storeQuestionAnswer(Request $request)
    {
        
        
        foreach ($request->answer as $answer) {
            $question = new QADetail ;
            $question->question_id = $request->question;
            $question->answer_id = $answer;
        $question->save();    
        }
        
        

        return redirect('preguntas-respuestas');
    }
    /*public function assQuestion($id)
    {
        $users = DB::table('users')
        ->select('users.id','users.names','users.surnames')
        ->where('users.id','=',$id)
        ->get();
        $roles = Role::all();
        return View::make('permission/assrole', compact('roles','users'));
    }*/
    
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

        

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
