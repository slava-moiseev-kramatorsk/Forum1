<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('welcome');
    });
Route::group([
    'middleware' => 'auth'
], function () {

Route::get('/new_public', [ForumController::class, 'new_public'])->name('new_public');
Route::get('/{forum}/pre_show', [ForumController::class, 'pre_show'])->name('pre_show');
Route::get('/forums/{forum}', [ForumController::class, 'public_theme'])->name('public_theme');

Route::get('/new_user', [UserController::class, 'new_user'])->name('new_user');
Route::get('/{forum}/user-profile', [UserController::class, 'show'])->name('show-user-profile');

Route::get('/NewTheme', [ForumController::class, 'addTheme'])->name('addTheme');
Route::post('/create', [ForumController::class, 'create'])->name('create_theme');
Route::get('/', [ForumController::class, 'index'])->name('index');
Route::get('/{forum}/show', [ForumController::class, 'show'])->name('show');
Route::delete('/{forum}', [ForumController::class, 'destroy'])->name('destroy');
Route::get('/forums/{forum}/edit', [ForumController::class, 'edit'])->name('edit');
Route::put('/forums/{id}', [ForumController::class, 'update'])->name('update');
Route::post('/forums/{forum}/create-comment', [CommentController::class, 'create'])->name('create_comment');
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (\Illuminate\Http\Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('index');
})->middleware(['auth', 'signed'])->name('verification.verify');




Auth::routes();



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
