<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use DB;
use Exception;

class GameController extends Controller
{
    public function index(){
        return redirect()->route('game.show');
    }

    public function store(Request $req){
        $data = $req->all();
        $game = new Game();
        $game->playerId = $data['playerId'];
        $game->questionId = $data['questionId'];
        $game->selectedOption = $data['selectedOption'];
        $game->save();
        return "Data saved successfully";
    }
}
