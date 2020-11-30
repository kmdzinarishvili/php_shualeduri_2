<?php

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


Route::get('/users/login', [\App\Http\Controllers\LoginController::class, 'login'])->name("login");
Route::post('/users/post-login', [\App\Http\Controllers\LoginController::class, 'postLogin'])->name("post.login");


Route::middleware('auth')->group(function(){
//list all routes here
    Route::get('/',[\App\Http\Controllers\QuizController::class, 'quiz'])->name('quiz');
    Route::get('/create',[\App\Http\Controllers\QuizController::class, 'create'])->name('create');
    Route::put('/post-create',[\App\Http\Controllers\QuizController::class, 'postCreate'])->name('post.create');
    Route::post('/results', [\App\Http\Controllers\QuizController::class, 'postQuiz'])->name('post.quiz');
    });


