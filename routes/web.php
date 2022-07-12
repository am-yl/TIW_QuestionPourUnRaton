<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\UserController;


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
    return view('welcome');
});

Route::get('/dashboard', [Controller::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::prefix('/questionnaires')->middleware(['auth'])->controller(QuestionnaireController::class)->name('questionnaires.')->group(function () {

    Route::get('', 'index')->name('index');

    Route::get('/new', 'create')->name('new');

    Route::post('/store', 'store')->name('store');

    Route::get('/{id}/showedit/{question_id}', 'show')->name('showedit');

    Route::get('/{id}', 'show')->name('show');

    Route::get('{id}/edit/', 'edit')->name('edit');

    Route::put('{id}/update', 'update')->name('update');

    Route::get('/{id}/delete', 'destroy')->name('delete');

});

Route::prefix('/questions')->middleware(['auth'])->controller(QuestionController::class)->name('questions.')->group(function () {

    Route::post('/store', 'store')->name('store');

    Route::put('{id}/update', 'update')->name('update');

    Route::get('/{q_id}/delete/{id}', 'destroy')->name('delete');

    Route::post('/repondre/{id}', 'answer')->name('answer');

});

Route::prefix('/groupes')->middleware(['auth'])->controller(GroupeController::class)->name('groupes.')->group(function () {

    Route::get('', 'index')->name('index');

    Route::get('/new', 'create')->name('new');

    Route::post('/store', 'store')->name('store');

    Route::get('/{id}', 'show')->name('show');

    Route::get('{id}/edit/', 'edit')->name('edit');

    Route::put('{id}/update', 'update')->name('update');

    Route::get('/{id}/delete', 'destroy')->name('delete');

});

Route::prefix('/users')->middleware(['auth'])->controller(UserController::class)->name('users.')->group(function () {

    Route::get('', 'index')->name('index');

    Route::get('{id}/edit/', 'edit')->name('edit');

    Route::put('{g_id}/ajout_groupe/', 'ajout_groupe')->name('add_group');

    Route::put('{id}/update', 'update')->name('update');

    Route::get('/{id}/delete', 'destroy')->name('delete');

});

require __DIR__.'/auth.php';
