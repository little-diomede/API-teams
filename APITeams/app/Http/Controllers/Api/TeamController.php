<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function getAllTeams() {
        $teams = Team::get()->toJson(JSON_PRETTY_PRINT);
        return response($teams, 200);
    }

    public function getTeam($id) {
        if (Team::where('id', $id)->exists()) {
            $team = Team::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($team, 200);
        } else {
            return response()->json([
                "message" => "Team not found"
            ], 404);
        }
    }

    public function createTeam(Request $request) {
        $team = new Team;
        $team->name = $request->name;
        $team->winrate = $request->winrate;
        $team->href = $request->href;
        $team->save();

        return response()->json([
            "message" => "Team record created"
        ], 201);
    }

    public function updateTeam(Request $request, $id) {
        if (Team::where('id', $id)->exists()) {
            $team = Team::find($id);

            $team->name = is_null($request->name) ? $team->name : $request->name;
            $team->winrate = is_null($request->winrate) ? $team->winrate : $request->winrate;
            $team->href = is_null($request->href) ? $team->href : $request->href;
            $team->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Team not found"
            ], 404);
        }
    }

    public function deleteTeam ($id) {
        if(Team::where('id', $id)->exists()) {
            $team = Team::find($id);
            $team->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Team not found"
            ], 404);
        }
    }
}
