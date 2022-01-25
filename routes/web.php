<?php

use App\Models\Competition;
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

Route::post('/competition', function () {
    $competition = Competition::create();
    return redirect("competition/$competition->id");
})->middleware(['auth']);

Route::get('/competition/{competition}', function (Competition $competition) {
    return view("competition", $competition);
});

require __DIR__.'/auth.php';
