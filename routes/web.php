<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubredditController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\Subreddit;
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
    return view('home', [
        'posts' => Post::all(),
        'subreddits' => Subreddit::take(4)->get()
    ]);
})->name('home');

// Route::middleware('auth')->group(function () {
    
// });

Route::get('/r/{subreddit}', [SubredditController::class, 'index']);
Route::get('/r/{subreddit}/comments/{postTitle}', [PostController::class, 'index']);


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
