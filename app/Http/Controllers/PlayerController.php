<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function store(Request $req){
        $player = new Player();
        $player->name = $req->username;
        $player->save();

        $playerId = Player::orderByDesc('created_at')->first('id');
        $data = $playerId->id;
        // return $data." player Id saved successfully";
        // return redirect()->route("game.show");

        session()->put('player', $data);
        session()->flash('player', $data);
        return redirect()->action([OptionController::class, 'show']);
        // return redirect()->action([OptionController::class, 'show'], ['playerId' => $data]);
    }
}
