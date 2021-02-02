<?php

use App\Http\Controllers\FrontPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubredditController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubmitController;
use App\Http\Controllers\UpvoteController;
use App\Http\Livewire\CreatePost;
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

Route::get('/', [FrontPageController::class, 'index'])->name('home');

// Route::middleware('auth')->group(function () {
    
// });

Route::get('/r/{subreddit}', [SubredditController::class, 'index']);
Route::post('/r/{subreddit}', [SubredditController::class, 'store']);

Route::get('/r/{subreddit}/comments/{postTitle}', [PostController::class, 'index'])->name('post');
Route::post('/r/{subreddit}/comments/{post}/submit', [CommentController::class, 'store']);
Route::get('/submit', SubmitController::class);
Route::get('/r/{subreddit}/submit', [PostController::class, 'create']);
Route::post('/r/{subreddit}/submit', [PostController::class, 'store']);
Route::post('/{user}/upvote/{post}', [UpvoteController::class, 'upvote']);
Route::post('/{user}/downvote/{post}', [UpvoteController::class, 'downvote']);
Route::post('/{user}/upvote/comment/{comment}', [UpvoteController::class, 'upvoteComment']);
Route::post('/{user}/downvote/comment/{comment}', [UpvoteController::class, 'downvoteComment']);


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
