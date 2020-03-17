<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Subcategory;
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
        return View::make('challenge.preguntas');
    }

    public function byLinea($id)
    {
        dd(Category::find($id));
		
	}
}
