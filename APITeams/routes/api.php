<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\PlayerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('teams', 'App\Http\Controllers\Api\TeamController@getAllTeams');
Route::get('teams/{id}', 'App\Http\Controllers\Api\TeamController@getTeam');
Route::post('teams', 'App\Http\Controllers\Api\TeamController@createTeam');
Route::put('teams/{id}', 'App\Http\Controllers\Api\TeamController@updateTeam');
Route::delete('teams/{id}','App\Http\Controllers\Api\TeamController@deleteTeam');

Route::get('players', 'App\Http\Controllers\Api\PlayerController@getAllPlayers');
Route::get('players/{id}', 'App\Http\Controllers\Api\PlayerController@getPlayer');
Route::post('players', 'App\Http\Controllers\Api\PlayerController@createPlayer');
Route::put('players/{id}', 'App\Http\Controllers\Api\PlayerController@updatePlayer');
Route::delete('players/{id}','App\Http\Controllers\Api\PlayerController@deletePlayer');
