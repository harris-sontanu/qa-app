<?php

use App\Http\Controllers\QuestionController;
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

Route::redirect('/', '/blog');
Route::get('/home', function () {
    return view('pages.home');
})->name('home');

Route::get('/questions/ask', [QuestionController::class, 'create'])->name('questions.ask');
Route::resource('/questions', QuestionController::class)->except(['create']);