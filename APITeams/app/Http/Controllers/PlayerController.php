<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlayerController extends Controller
{
/*
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/teams');
        $teams = json_decode($response->getbody());

        return view('teams.index',compact('teams'));
    }
*/


    public function create(Request $request)
    {
        return view('players.create', ['team_id' => $request->team_id]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'playernumber' => 'required',
            'starter' => 'sometimes|boolean',
            'joined' => 'required',
            'href' => 'required',
        ]);
        if (!$request['starter']) {
            $request['starter'] = 0;
        }
        Http::post('http://127.0.0.1:8000/api/players', $request->all());

        return redirect()->route('teams.show', $request->team_id)->with('succes','player succesfully created');
    }

    public function show($id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/players/' . $id);
        $player = head(json_decode($response->getbody()));
        return view('players.show', compact('player'));
    }


    public function edit($id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/players/' . $id);
        $player = head(json_decode($response->getbody()));
        return view('players.edit',compact('player'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'playernumber' => 'required',
            'starter' => 'sometimes|boolean',
            'joined' => 'required',
            'href' => 'required',
        ]);
        if (!$request['starter']){
            $request['starter'] = 0;
        }
        Http::put('http://127.0.0.1:8000/api/players/' . $id, $request->all());

        return redirect()->route('teams.show', $request->team_id)->with('Player updated succesfully');
    }

    public function destroy(Request $request, $id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/players/' . $id);
        $player = head(json_decode($response->getbody()));
        $team_id = $player->team_id;

        Http::delete('http://127.0.0.1:8000/api/players/' . $id);

        return redirect()->route('teams.show', $team_id)
            ->with('success','Player deleted successfully');
    }
}
