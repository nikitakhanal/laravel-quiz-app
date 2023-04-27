<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use DB;


class GameController extends Controller
{
    public function index(){
        return redirect()->route('game.show');
    }
}
