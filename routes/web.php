<?php

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Models\Notification;

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

Route::get('/home', function () {
    return view('home', [
        'title' => 'Home',
        'posts' => Post::where('post_category_id', 1)->latest()->get(),
        'notifs' => Notification::where('to_user_id', auth()->user()->id)->latest()->get(),
    ]);
})->middleware('auth')->name('home');

Route::get('/menfess', [PostController::class, 'allFess'])->middleware('auth')->name('menfess');
Route::get('/menfess/{posts}', [PostController::class, 'showFess'])->middleware('auth');

Route::get('/{author:username}/status', [PostController::class, 'all'])->middleware('auth');
Route::get('/{author:username}/status/{posts}', [PostController::class, 'show'])->middleware('auth');

// AUTHENTICATION
Route::get('/', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'regindex'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// POSTS
Route::post('/create', [PostController::class, 'create'])->middleware('auth');
Route::delete('/delete', [PostController::class, 'destroy'])->middleware('auth'); //not used
Route::post('/like', [PostController::class, 'like'])->middleware('auth');
Route::post('/comment', [PostController::class, 'comment'])->middleware('auth')->name('post.comment');
Route::post('/reply', [PostController::class, 'reply'])->middleware('auth')->name('comment.reply');
Route::post('/follow', [PostController::class, 'follow'])->middleware('auth')->name('follow');
Route::post('/unfollow', [PostController::class, 'unfollow'])->middleware('auth')->name('unfollow');
