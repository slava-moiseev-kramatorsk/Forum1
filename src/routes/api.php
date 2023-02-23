<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;

Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class,'login']);
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class,'register']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/books', [\App\Http\Controllers\BooksController::class,'store']);
Route::patch('/books/{id}', [\App\Http\Controllers\BooksController::class,'update']);
Route::delete('/books/{id}', [\App\Http\Controllers\BooksController::class,'destroy']);

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::get('/get' , 'TestController');
    Route::get('/books', [\App\Http\Controllers\BooksController::class,'index']);
    Route::post('/logout',[\App\Http\Controllers\Auth\LoginController::class,'logout']);

});
//Route::get('/get' , 'TestController');
