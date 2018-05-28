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

    public function create()
    {
        $categories = Category::all();
        return view('user.form', compact('categories'));
    }

    public function store(Request $request)
    {
        Question::create($request->all());
        return redirect()->route('pages.index');
    }
}
