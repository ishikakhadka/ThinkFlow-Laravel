<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;

use App\Http\Controllers\TrendingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [DashboardController::class,'index'])->name('dashboard');
Route::resource('ideas', IdeaController::class)->middleware('auth');
Route::get('/profile', [UserController::class,'profile'])->middleware('auth')->name('profile');
Route::post('/ideas/{idea}/comments',[CommentController::class,'store'] )->middleware('auth')->name('ideas.comments.store');
Route::get('/ideas/{idea}/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/ideas/{idea}/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('ideas/{idea}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::post('/users/{user}/follow',[FollowerController::class,'follow'] )->middleware('auth')->name('users.follow');
Route::post('/users/{user}/unfollow',[FollowerController::class,'unfollow'] )->middleware('auth')->name('users.unfollow');
Route::post('/ideas/{idea}/like',[IdeaLikeController::class,'like'] )->middleware('auth')->name('ideas.like');
Route::post('/ideas/{idea}/unlike',[IdeaLikeController::class,'unlike'] )->middleware('auth')->name('ideas.unlike');
Route::resource('users', UserController::class);
Route::get('/terms',function(){
    return view('terms');
})->name('terms')->middleware('auth');
Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');
Route::get('/trending', TrendingController::class)->middleware('auth')->name('trending');


Route::get('/lang/{lang}', function ($lang) {
app()->setLocale($lang);
session()->put('locale', $lang);
    return redirect()->route('dashboard');
})->name('lang');

Route::middleware(['auth', 'can:admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', action: [AdminUserController::class, 'index'])->name('users');
    Route::get('/ideas', action: [AdminIdeaController::class, 'index'])->name('ideas');

});
