<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\View;

use App\Models\Category;

use App\Models\User;

use App\Models\Subcategory;

use App\Models\Question;

use Illuminate\Support\Facades\DB;

class LineasMarcasController extends Controller
{
    /* Lista de Categorias y Subcategorias */
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return View::make('linebrand/list', compact('categories','subcategories'));
    }

    /* Cargar crear categoria */
    
    public function createLine()
    { 
        $subcategories = Subcategory::all();
        $users = User::all();
        return \View::make('linebrand/new', compact('subcategories','users'));
    }

    /* Cargar Crear subcategoria */

    public function createBrand()
    {
        $questions = Question::where('state_id','=','1')->get();
        return \View::make('linebrand/newbrand', compact('questions'));
    }

    /* Crear categoria */

    public function storeLinea(Request $request)
    {
        $jsonUsers = json_encode($request->users);
        $jsonBrand = json_encode($request->subcategories);
        $category = new Category;
        $category->name = $request->brand;
        $category->description = $request->description;
        $category->user = $jsonUsers;
        $category->subcategory = $jsonBrand;
        $category->save();
        return redirect('lineas-marcas');
    }

    /* Crear subcategoria */

    public function storeBrand(Request $request)
    {
        $jsonQuestions = json_encode($request->question);
        $subcategory = new Subcategory;
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;
        $subcategory->question = $jsonQuestions;
        $subcategory->save();
    
        return redirect('lineas-marcas');
    }

    /* Eliminar categoria */

    public function destroy($category)
    {
        $category = Category::find($category);
        $category->delete();

        return redirect('lineas-marcas')->with('success', trans('Linea eliminada satisfactoriamente'));
        
    }

    /* Eliminar subcategoria */


    public function destroyBrand($subcategory)
    { 
        $subcategory = Subcategory::find($subcategory);
        $subcategory->delete();

        return redirect('lineas-marcas')->with('success', trans('Marca eliminada satisfactoriamente'));
        
    }

    /* Mostrar categoria */

    public function showLine(Request $request, $id)
    {
        $category = Category::find($id);
        $users = User::all();
        return \View::make('linebrand/show-lines',compact('category','users'));
    }

    /* Mostrar subcategoria */

    public function showBrand(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        return \View::make('linebrand/show-brands',compact('subcategory'));
    }

    /* Cargar edición categoria */

    public function editBrand($id)
    {
        $brand = Subcategory::find($id);
        $questions = Question::all();
        return \View::make('linebrand/edit-brand',compact('questions','brand'));
    }

    /* Cargar edición subcategoria */

    public function editLine($id)
    {
        $category = Category::find($id);
        $subcategories = Subcategory::all();
        $users = User::all();
        return \View::make('linebrand/edit',compact('category','subcategories', 'users'));
    }
    
    /* Modificar subcategoria */

    public function updateBrand(Request $request, $id )
    {
        $jsonQuestions = json_encode($request->question);
        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;
        $subcategory->question = $jsonQuestions;
        $subcategory->save();
        return redirect('lineas-marcas');
    }

    /* Modificar categoria */

    public function updateLine(Request $request, $id )
    {
        $jsonUsers = json_encode($request->users);
        $jsonBrands = json_encode($request->subcategories);
        $line = Category::find($id);
        $line->name = $request->line;
        $line->description = $request->description;
        $line->user = $jsonUsers;
        $line->subcategory = $jsonBrands;
        $line->save();
        return redirect('lineas-marcas');
    }
}
