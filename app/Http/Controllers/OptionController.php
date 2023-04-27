<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;

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
}

