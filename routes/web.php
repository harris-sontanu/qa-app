<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AcceptAnswerController;
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

Route::redirect('/', '/home');
Route::get('/home', HomeController::class)
    ->name('home');

Route::get('/questions/ask', [QuestionController::class, 'create'])
    ->name('questions.ask');
Route::resource('questions', QuestionController::class)
    ->except(['create']);
Route::resource('questions.answers', AnswerController::class)
    ->except(['index', 'create', 'show']);
Route::post('/answers/{answer}/accept', AcceptAnswerController::class)
    ->name('answers.accept');