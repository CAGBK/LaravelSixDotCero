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
        return \View::make('linebrand/new', compact('subcategories'));
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
        $category = new Category;
        $category->name = $request->brand;
        $category->description = $request->description;
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
        return \View::make('linebrand/show-lines',compact('category'));
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
        return \View::make('linebrand/edit-brand',compact('questions','brand'));
    }
    public function editLine($id)
    {
        $category = Category::find($id);
        $subcategories = Subcategory::all();
        return \View::make('linebrand/edit',compact('category','subcategories'));
    }
    public function updateBrand(Request $request, $id )
    {
        $brand = Subcategory::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();
        $i = 0;
        
        if($request->question){
        foreach ($request->question  as $key => $value ) {
            $question = SubcategoryQuestionDetail::find($request->question[$key]);
            if ($question){

            }else{
               
                    $question = new SubcategoryQuestionDetail;
                    $question->subcategory_id = $id;
                    $question->question_id = $request->question[$i];
    
                $question->save();   
            
        }
            $question->subcategory_id = $brand->id;
                $question->question_id =  $request->question[$i];
                $question->save();   
                $i ++;
            }
        }else {
            $question = SubcategoryQuestionDetail::where('subcategory_id', '=' , $id)->delete();
            
        }
        
        
        return redirect('lineas-marcas');
    }
}
