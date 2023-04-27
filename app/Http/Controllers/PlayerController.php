<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function store(Request $req){
        $player = new Player();
        $player->name = $req->name;
        $player->save();
        return "Player saved successfully";
    }
}
