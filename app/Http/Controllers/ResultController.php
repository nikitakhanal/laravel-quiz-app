<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\Game;
use Illuminate\Support\Facades\Session;

class ResultController extends Controller
{
    public function show(){

        if(!session()->has('player')){
            return "not set";
        }

        $correctData = Option::select('questionId', 'options')->get();        
        $playerId = session()->get('player');
        $selectedOptions = Game::select('questionId', 'selectedOption')->where('playerId', '=', $playerId)->get();
        
        $array = json_decode($correctData, true);

        $correctDataToSend = array_map(function($item) {
            $options = json_decode($item['options'], true);
            return [
                'questionId' => $item['questionId'],
                'option' => $options[0],
            ];
        }, $array);

        // $correctOptions = json_encode($result);

        $data= array(
            "correct"=>$correctDataToSend,
            "selected"=>$selectedOptions
        );

        return $data;
    }
}