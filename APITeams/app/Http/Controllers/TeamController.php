<?php

namespace App\Http\Controllers;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeamController extends Controller
{

    public function index()
    {
        $response = Http::get('http://127.0.0.1:8000/api/teams');
        $teams = json_decode($response->getbody());

        return view('teams.index',compact('teams'));
    }


    public function create()
    {
        return view('teams.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'winrate' => 'required',
            'href' => 'required',
        ]);
        Http::post('http://127.0.0.1:8000/api/teams', $request->all());

        return redirect()->route('teams.index')->with('succes','Team created successfully');
    }

    public function show($id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/teams/' . $id);
        $team = head(json_decode($response->getbody()));
        return view('teams.show',compact('team'));
    }


    public function edit($id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/teams/' . $id);
        $team = head(json_decode($response->getbody()));
        return view('teams.edit',compact('team'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'winrate' => 'required',
            'href' => 'required',
        ]);
        Http::put('http://127.0.0.1:8000/api/teams/' . $id, $request->all());

        return redirect()->route('teams.index')->with('Team succesfully updated');
    }

    public function destroy($id)
    {
        Http::delete('http://127.0.0.1:8000/api/teams/' . $id);

        return redirect()->route('teams.index')
            ->with('success','Team deleted successfully');
    }
}
