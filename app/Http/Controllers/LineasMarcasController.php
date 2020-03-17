<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Grunenthal\Models\State;

use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Hash;

use App\Models\Category;

use App\Models\User;

use App\Models\QADetail;

use App\Models\Subcategory;

use App\Models\Question;

use App\Models\CategorySubcategoryDetail;

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
        $subcategories = Subcategory::all();
        return View::make('linebrand/list', compact('categories','subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createLine()
    { 
        $subcategories = Subcategory::all();
        $users = User::all();
        return \View::make('linebrand/new', compact('subcategories','users'));
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
        $jsonData = json_encode($request->users);
        $category = new Category;
        $category->name = $request->brand;
        $category->description = $request->description;
        $category->user = $jsonData;
        $category->save();
        $category = Category::all();
        $categoryid = $category->last();
        if ($request->subcategories) {
            foreach ($request->subcategories as $subcategory1) {
                $question = new CategorySubcategoryDetail;
                $question->category_id = $categoryid->id;
                $question->subcategory_id = $subcategory1;
            }
            $question->save();
        }
            

        return redirect('lineas-marcas');
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
        
        if($request->question)
        {
            foreach ($request->question as $question1) {
                $question = new SubcategoryQuestionDetail;
                $question->subcategory_id = $subcategoryid->id;
                $question->question_id = $question1;

            $question->save();    
            }
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
    public function destroy($category)
    {
        $category = Category::find($category);
        $category->delete();

        return redirect('lineas-marcas')->with('success', trans('Linea eliminada satisfactoriamente'));
        
    }

    public function destroyBrand($subcategory)
    { 
        $subcategory = Subcategory::find($subcategory);
        $subcategory->delete();

        return redirect('lineas-marcas')->with('success', trans('Marca eliminada satisfactoriamente'));
        
    }

    public function showLine(Request $request, $id)
    {
        $category = Category::find($id);
        $users = User::all();
        return \View::make('linebrand/show-lines',compact('category','users'));
    }

    public function showBrand(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        return \View::make('linebrand/show-brands',compact('subcategory'));
    }
    public function editBrand($id)
    {
        $questions = Question::all();
        $brand = Subcategory::find($id);
        foreach($questions as $question) 
                    {
                    $questionList[]=$question->id;
                    }
                    //dd($eventlist)//first perform this dd() 
                    $brandsi = DB::table('question_subcategory')->select('question_id')->where('subcategory_id' ,'=' , $id)->get();  
                    $list = [];
                    foreach($brandsi as $brandq) 
                    {//getting all the teams who already played in first round
                        $list[]=$brandq->question_id;
                    }    
                    $questionbrand = array_diff ($questionList,$list) ;
                    
                    
                    
        //dd($list);//comment out first dd() , then test this dd()
        $questionids = Question::all();
        return \View::make('linebrand/edit-brand',compact('questions','brand', 'questionbrand', 'list'));
    }
    public function editLine($id)
    {
        $category = Category::find($id);
        $subcategories = Subcategory::all();
        $users = User::all();
        foreach($subcategories as $subcategory) 
        {
            $subcategoryList[]=$subcategory->id;
        }
        //dd($eventlist)//first perform this dd() 
        $linesi = DB::table('category_subcategory')->select('subcategory_id')->where('category_id' ,'=' , $id)->get();  
        $list = [];
        foreach($linesi as $linec) 
        {//getting all the teams who already played in first round
            $list[]=$linec->subcategory_id;
        }    
        $subcategorycat = array_diff ($subcategoryList,$list) ;
        return \View::make('linebrand/edit',compact('category','subcategories', 'subcategorycat' , 'list', 'users'));
    }

    public function updateBrand(Request $request, $id )
    {
        $brand = Subcategory::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();
        $brandsi = DB::table('question_subcategory')->select('id', 'question_id')->where('subcategory_id' ,'=' , $id)->get(); 
        //Request question viene vacio elimina las preguntas del request
        if($request->question){
            $brandsids = DB::table('question_subcategory')->select('question_id')->where('subcategory_id' ,'=' , $id)->get();
            $request_question =  [];
            foreach ($brandsids as $valor) {
                $request_question[] = $valor->question_id;
            }
           
            foreach ( $request->question as $value_id_request) {
                $question_request_id[] = (int)$value_id_request;  
            }
            
            $array_diff_request_bd  = array_diff($question_request_id, $request_question);
            
            $array_not_find = array_diff( $request_question, $question_request_id) ; 
            if (isset($brandsi)){
                //Si el valor esta en la consulta y diferencia de arrays
                if ($array_diff_request_bd){ 
                    foreach ($array_diff_request_bd as $key => $value){
                        $question = new SubcategoryQuestionDetail;
                        $question->subcategory_id = $id;
                        $question->question_id = $value;     
                        $question->save();
                    }
                    if($array_not_find){
                        foreach($array_not_find as $key => $value){
                            $question = SubcategoryQuestionDetail::where('question_id', '=' , $value )
                                                                   ->where('subcategory_id', '=' , $id )
                                                                   ->delete();
                        } 
                    }
                    
                }else {
                    //Si el valor no esta en el request ingresa y elimina
                    foreach($array_not_find as $key => $value){
                        $question = SubcategoryQuestionDetail::where('question_id', '=' , $value )
                                                               ->where('subcategory_id', '=' , $id )
                                                               ->delete();
                    }
                    if ($array_diff_request_bd){ 
                        foreach ($array_diff_request_bd as $key => $value){
                            $question = new SubcategoryQuestionDetail;
                            $question->subcategory_id = $id;
                            $question->question_id = $value;     
                            $question->save();
                        }
                    }             
                }
            }else {
                foreach ( $request->question as $id_question){
                        $question = new SubcategoryQuestionDetail;
                        $question->subcategory_id = $id;
                        $question->question_id = $id_question;
                        $question->save(); 
                        
                    }
                } 
                
        }else{
            $question = SubcategoryQuestionDetail::where('subcategory_id', '=' , $id)->delete();
        }
        return redirect('lineas-marcas');
    }
    public function updateLine(Request $request, $id )
    {
        $jsonData = json_encode($request->users);
        $line = Category::find($id);
        $line->name = $request->line;
        $line->description = $request->description;
        $line->user = $jsonData;
        $line->save();

        $linesi = DB::table('category_subcategory')->select('id', 'subcategory_id')->where('category_id' ,'=' , $id)->get(); 
        //Request question viene vacio elimina las preguntas del request
        if($request->subcategories){
            $linessids = DB::table('category_subcategory')->select('subcategory_id')->where('category_id' ,'=' , $id)->get();
            $request_subcategory =  [];
            foreach ($linessids as $valor) {
                $request_subcategory[] = $valor->subcategory_id;
            }
           
            foreach ( $request->subcategories as $value_id_request) {
                $subcategory_request_id[] = (int)$value_id_request;  
            }
            
            $array_diff_request_bd  = array_diff($subcategory_request_id, $request_subcategory);
            
            $array_not_find = array_diff( $request_subcategory, $subcategory_request_id) ; 
            if (isset($linesi)){
                //Si el valor esta en la consulta y diferencia de arrays
                if ($array_diff_request_bd){ 
                    foreach ($array_diff_request_bd as $key => $value){
                        $question = new CategorySubcategoryDetail;
                        $question->category_id = $id;
                        $question->subcategory_id = $value;     
                        $question->save();
                    }
                    if($array_not_find){
                        foreach($array_not_find as $key => $value){
                            $question = CategorySubcategoryDetail::where('subcategory_id', '=' , $value )
                                                                   ->where('category_id', '=' , $id )
                                                                   ->delete();
                        } 
                    }
                    
                }else {
                    //Si el valor no esta en el request ingresa y elimina
                    foreach($array_not_find as $key => $value){
                        $question = CategorySubcategoryDetail::where('subcategory_id', '=' , $value )
                                                               ->where('category_id', '=' , $id )
                                                               ->delete();
                    }
                    if ($array_diff_request_bd){ 
                        foreach ($array_diff_request_bd as $key => $value){
                            $question = new CategorySubcategoryDetail;
                            $question->category_id = $id;
                            $question->subcategory_id = $value;     
                            $question->save();
                        }
                    }             
                }
            }else {
                foreach ( $request->subcategories as $id_question){
                        $question = new CategorySubcategoryDetail;
                        $question->category_id = $id;
                        $question->subcategory_id = $id_question;
                        $question->save(); 
                        
                    }
                } 
                
        }else{
            $question = CategorySubcategoryDetail::where('category_id', '=' , $id)->delete();
        }
        return redirect('lineas-marcas');
    }
}
