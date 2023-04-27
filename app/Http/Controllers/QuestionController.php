<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    function store(Request $req){
        $data = $req->all();
        $question = new Question();
        $question->question = $data['question'];
        $question->difficulty = $data['difficulty'];
        $question->save();

        $questionId = Question::orderByDesc('created_at')->first('id');
        return array('questionId' => $questionId->id);
    }

    function show(){
        $question = Question::all();
        return view('adminDashboard1')->with(compact('question'));
    }
}
