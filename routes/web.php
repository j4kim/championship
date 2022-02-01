<?php

use App\Models\Competition;
use App\Models\Game;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', ['competitions' => Competition::all()]);
})->middleware(['auth'])->name('dashboard');

Route::post('/competitions', function () {
    $competition = Competition::create();
    return redirect("competitions/$competition->id");
})->middleware(['auth']);

Route::get('/competitions/{competition}', function (Competition $competition) {
    return view("competition", $competition->load('tournaments'));
})->middleware(['auth']);

Route::get('/tournaments/{tournament}', function (Tournament $tournament) {
    $tournament->load(
        'competition',
        'games.player1.user', 'games.player2.user',
        'host',
        'participants.tournament.games', 'participants.user'
    );
    foreach ($tournament->participants as $participant) {
        $participant->append('wins', 'points', 'gamesPlayed');
    }
    return view("tournament", $tournament);
})->middleware(['auth']);

Route::get('/tournaments/{tournament}/edit', function (Tournament $tournament) {
    $tournament->load('participants');
    return view("tournament.edit", $tournament);
})->middleware(['auth']);

Route::put('/tournaments/{tournament}', function (Tournament $tournament, Request $request) {
    $tournament->pictures = json_decode($request->pictures);
    $tournament->spot = $request->spot;
    $tournament->host_id = $request->host_id;
    $tournament->menu = $request->menu;
    $tournament->save();
    return redirect("tournaments/$tournament->id");
})->middleware(['auth']);

Route::get('/games/{game}', function (Game $game) {
    return view("game", $game->load('tournament'));
})->middleware(['auth']);

require __DIR__.'/auth.php';
