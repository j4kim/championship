<?php

use App\Models\Competition;
use App\Models\Game;
use App\Models\Tournament;
use App\Models\User;
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
    return view('dashboard', ['competitions' => Auth::user()->competitions]);
})->middleware(['auth'])->name('dashboard');

Route::get('/competitions/create', function () {
    return view('competition.create');
})->middleware(['auth']);

Route::post('/competitions', function (Request $request) {
    $competition = Competition::create($request->all());
    $competition->users()->attach(Auth::id());
    return redirect("competitions/$competition->id");
})->middleware(['auth']);

Route::get('/competitions/{competition}', function (Competition $competition) {
    $competition->load('tournaments')->append('standings');
    return view("competition", $competition);
})->middleware(['auth']);

Route::get('/competitions/{competition}/tournament/create', function (Competition $competition) {
    $competition->load('users');
    return view("tournament.create", compact('competition'));
})->middleware(['auth']);

Route::post('/competitions/{competition}/tournament', function (Competition $competition, Request $request) {
    $tournament = $competition->tournaments()->create([
        'date' => now(),
        'host_id' => $request->host_id
    ]);
    $tournament->participants()->createMany(
        collect($request->user_ids)->map(fn($id) => ['user_id' => $id])
    );
    return redirect("tournaments/$tournament->id/edit");
})->middleware(['auth']);

Route::get('/tournaments/{tournament}', function (Tournament $tournament) {
    $tournament->load(
        'competition',
        'games.player1.user', 'games.player2.user',
        'host',
        'participants.tournament.games', 'participants.user'
    );
    foreach ($tournament->participants as $participant) {
        $participant->append('wins', 'points', 'gamesPlayed', 'rankingScore');
    }
    $tournament->append('ranking');
    return view("tournament", $tournament);
})->middleware(['auth']);

Route::get('/tournaments/{tournament}/edit', function (Tournament $tournament) {
    $tournament->load('participants.user');
    return view("tournament.edit", $tournament);
})->middleware(['auth']);

Route::put('/tournaments/{tournament}', function (Tournament $tournament, Request $request) {
    $tournament->pictures = json_decode($request->pictures);
    $tournament->date = $request->date;
    $tournament->spot = $request->spot;
    $tournament->host_id = $request->host_id;
    $tournament->menu = $request->menu;
    $tournament->conditions = $request->conditions;
    $tournament->finished = $request->finished;
    $tournament->save();
    return redirect("tournaments/$tournament->id");
})->middleware(['auth']);

Route::get('/games/{game}', function (Game $game) {
    return view("game", $game->load('tournament', 'player1.user', 'player2.user'));
})->middleware(['auth']);

Route::post('/tournaments/{tournament}/game', function (Tournament $tournament, Request $request) {
    $game = $tournament->games()->create([
        'player_1_id' => $request->player_1_id,
        'player_2_id' => $request->player_2_id,
    ]);
    return redirect("games/$game->id");
})->middleware(['auth']);

Route::put('/games/{game}', function (Game $game, Request $request) {
    if ($request->delete) {
        $game->delete();
    } else {
        $game->played = @$request->played ?: false;
        $game->player_1_score = $request->player_1_score;
        $game->player_2_score = $request->player_2_score;
        $game->save();
    }
    return redirect("tournaments/" . $game->tournament->id);
})->middleware(['auth']);

require __DIR__.'/auth.php';
