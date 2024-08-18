<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\WatchedController;
use App\Http\Controllers\WatchlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::middleware('guest')->group(function(){
//     Route::get('/login',function(){return view('login');});
//     Route::get('/register',function(){return view('login');});
// });

// Route::middleware('auth')->group(function(){
//     Route::get('')
// })
Route::get('/',[MovieController::class,'getMovies']);


Route::get('movie/{api_id}',[MovieController::class,'showMovie'])->name('movie');

Route::middleware(['auth'])->group(function(){
    Route::post('/watchlist/add/{movie}', [WatchlistController::class, 'addToWatchlist'])->name('watchlist');
    Route::post('/watched/add/{movie}',[WatchedController::class,'addToWatched'])->name('watched');
    Route::get('/lists',[ListController::class,'show'])->name('lists');
    Route::post('add/list',[ListController::class,'add'])->name('add.list');
    Route::get('create/list',function(){return view('listForm');})->name('list.create');
    Route::post('/follow/{user}', [FollowController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{user}', [FollowController::class, 'unfollow'])->name('unfollow');  
    Route::get('/user/settings',function(){return view('settings');});
    Route::get('/profile',[UserController::class,'authUser'])->name('profile');
    Route::get('/watched',[WatchedController::class,'display'])->name('display.watched');
    Route::get('/watchlist',[WatchlistController::class,'display'])->name('display.watchlist');
    // Route::get('/settings')
});
Route::get('/profile/{id}',[UserController::class,'show'])->name('profile.show');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {return view('auth.login');})->name('login');
});






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Route::post('/movies/{movieId}/watchlist', [WatchlistController::class, 'addToWatchlist']);
});


// ->middleware('auth');