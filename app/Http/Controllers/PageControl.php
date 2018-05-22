<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Category;

class PageControl extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	$questions = Question::all();
    	return view('welcome', compact('categories','questions'));
    }


}
