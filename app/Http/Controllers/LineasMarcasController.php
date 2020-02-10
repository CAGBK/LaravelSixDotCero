<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Grunenthal\Models\State;

use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Hash;

use App\Models\Category;

use App\Models\QADetail;

use App\Models\Subcategory;

use App\Models\Question;

use App\Models\SubcategoryQuestionDetail;

use Illuminate\Support\Facades\DB;

class LineasMarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $questions = Question::all();
        $subcategories = Subcategory::all();
        return View::make('linebrand/list', compact('categories','subcategories', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLine()
    {
        $questions = DB::table('questions')
        ->select('questions.id','questions.question_name','questions.state_id')
        ->where('questions.state_id' , '=' , '1' )
        ->get();
        return \View::make('linebrand/new', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function createBrand()
    {
        $questions = DB::table('questions')
        ->select('questions.id','questions.question_name','questions.state_id')
        ->where('questions.state_id' , '=' , '1' )
        ->get();
        return \View::make('linebrand/newbrand', compact('questions'));
    }
    public function storeLinea(Request $request)
    {
        $question = Question::create(['question_name' => $request->question, 
        'state_id' => $request->state_id ]);
        $questions = Question::all();
        $answers = Answer::all();
        return redirect('lineas-marcas');
        return View::make('', compact('questions','answers','states'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeBrand(Request $request)
    {
        
        $subcategory = new Subcategory;
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;
        $subcategory->save();
        
        $subcategory = Subcategory::all();
        $subcategoryid = $subcategory->last();
        
        foreach ($request->question as $question1) {
            $question = new SubcategoryQuestionDetail;
            $question->subcategory_id = $subcategoryid->id;
            $question->question_id = $question1;

        $question->save();    
        }

        return redirect('lineas-marcas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createLineBrand()
    {
        $questions = Question::all();
        $answers = Answer::all();
        $states = State::all();
        return \View::make('linebrand/newquestionask',compact('questions','answers', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeLineBrand(Request $request)
    {
        foreach ($request->answer as $answer) {
            $question = new QADetail ;
            $question->question_id = $request->question;
            $question->answer_id = $answer;
        $question->save();    
        }
        
        

        return redirect('lineas-marcas');
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