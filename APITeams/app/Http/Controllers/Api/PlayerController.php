<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function getAllPlayers() {
        $player = Player::get()->toJson(JSON_PRETTY_PRINT);
        return response($player, 200);
    }

    public function getPlayer($id) {
        if (Player::where('id', $id)->exists()) {
            $player = Player::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($player, 200);
        } else {
            return response()->json([
                "message" => "Player not found"
            ], 404);
        }
    }

    public function createPlayer(Request $request) {
        $player = new Player;
        $player->username = $request->username;
        $player->name = $request->name;
        $player->playernumber = $request->playernumber;
        $player->starter = $request->starter;
        $player->joined = $request->joined;
        $player->href = $request->href;
        $player->team_id = $request->team_id;
        $player->save();

        return response()->json([
            "message" => "player record created"
        ], 201);
    }

    public function updatePlayer(Request $request, $id) {
        if (Player::where('id', $id)->exists()) {
            $player = Player::find($id);

            $player->username = is_null($request->username) ? $player->username : $request->username;
            $player->name = is_null($request->name) ? $player->name : $request->name;
            $player->playernumber = is_null($request->playernumber) ? $player->playernumber : $request->playernumber;
            $player->starter = is_null($request->starter) ? $player->starter : $request->starter;
            $player->joined = is_null($request->joined) ? $player->joined : $request->joined;
            $player->href = is_null($request->href) ? $player->href : $request->href;
            $player->team_id = is_null($request->team_id) ? $player->team_id : $request->team_id;
            $player->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Player not found"
            ], 404);
        }
    }

    public function deletePlayer ($id) {
        if(Player::where('id', $id)->exists()) {
            $player = Player::find($id);
            $player->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Player not found"
            ], 404);
        }
    }
}
