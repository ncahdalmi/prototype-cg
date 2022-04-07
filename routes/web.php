<?php

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
        'title' => 'Home',
        'users' => User::all(),
        'posts' => Post::where('post_category_id', 1)->get(),
        'comments' => Comment::all(),
        'likes' => Like::all()
    ]);
});

Route::get('/menfess', [PostController::class, 'allFess']);
Route::get('/menfess/{posts}', [PostController::class, 'showFess']);

Route::get('/{author:username}/status', [PostController::class, 'all']);
Route::get('/{author:username}/status/{posts}', [PostController::class, 'show']);
