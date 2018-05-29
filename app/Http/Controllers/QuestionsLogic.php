<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionsLogic extends Controller
{
    public function sort(Question $question)
    {
        $questions = Question::all()->sortBy('status');
        return view('admin.questions.index', compact('questions'));
    }
}
