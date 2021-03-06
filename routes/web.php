<?php

use App\Http\Controllers\FrontPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubredditController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImagePostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubmitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PopularController;
use App\Models\User;

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

Route::get('/', [FrontPageController::class, 'index'])->name('home');
Route::get('/popular', [PopularController::class, 'index']);

// Route::middleware('auth')->group(function () {
    
// });

Route::get('/r/{subreddit}', [SubredditController::class, 'index']);
Route::get('/subreddits/create', [SubredditController::class, 'create'])->middleware('auth');
Route::post('/subreddits/create', [SubredditController::class, 'store'])->middleware('auth');

Route::get('/r/{subreddit}/comments/{postTitle}/{type}/{id}', [PostController::class, 'show'])->name('post');
Route::delete('/r/{subreddit}/comments/{postTitle}/{type}/{id}', [PostController::class, 'delete'])->name('post');
Route::put('/r/{subreddit}/comments/{postTitle}/{type}/{id}', [PostController::class, 'update'])->name('post');
Route::middleware(['auth'])->group( function () {
    Route::get('/r/{subreddit}/submit', [PostController::class, 'create']);
    Route::post('/r/{subreddit}/submit/text', [PostController::class, 'store']);
    Route::post('/r/{subreddit}/submit/image', [ImagePostController::class, 'store']);
    Route::get('/submit', SubmitController::class);
});


Route::post('/r/{subreddit}/comments/{postId}/submit/{type}', [CommentController::class, 'store']);
Route::post('/{comment}/reply', [CommentController::class, 'storeReply']);


Route::get('/user/{user}', [ProfileController::class, 'index'])->name('profile.show');
Route::get('/user/{user}/{listItem}', [ProfileController::class, 'list']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
