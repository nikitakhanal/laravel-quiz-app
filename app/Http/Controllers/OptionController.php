<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use Illuminate\Support\Facades\DB;

class OptionController extends Controller
{
    public function store(Request $req){
        $data = $req->all();
        $option = new Option();
        $option->questionId = $data['questionId'];
        $option->options = json_encode($data['options']);
        $option->save();
        return "Options added successfully";
    }

    public function show(Request $req){
        if (!session()->has('player')) {
            return view('welcome');
        } else{
            // $playerId = request()->get('playerId');
            $playerId = $req->session()->get('player');
            $result = DB::table('options')
            ->join('questions', 'options.questionId', '=', 'questions.id')
            // ->select('questions.question as Question', 'options.options as Options')
            ->select('*')
            ->get();  
            $result = json_decode($result);
            shuffle($result);
            return view('game')->with(["result"=>$result, "playerId"=>$playerId]);
            // return view('game')->with(["result"=>$result]);
        }
    }
}

