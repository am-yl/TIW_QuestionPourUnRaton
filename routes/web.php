<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\QuestionController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/questionnaires')->middleware(['auth'])->controller(QuestionnaireController::class)->name('questionnaires.')->group(function () {

    Route::get('', 'index')->name('index');

    Route::get('/new', 'create')->name('new');

    Route::post('/store', 'store')->name('store');

    Route::get('/{id}', 'show')->name('show');

    Route::get('{id}/edit/', 'edit')->name('edit');

    Route::put('{id}/update', 'update')->name('update');

    Route::get('/{id}/delete', 'destroy')->name('delete');

});

Route::prefix('/questions')->middleware(['auth'])->controller(QuestionController::class)->name('questions.')->group(function () {

    Route::get('', 'index')->name('index');

    Route::get('/new', 'create')->name('new');

    Route::post('/store', 'store')->name('store');

    Route::get('/{id}', 'show')->name('show');

    Route::get('{id}/edit/', 'edit')->name('edit');

    Route::put('{id}/update', 'update')->name('update');

    Route::get('/{id}/delete', 'destroy')->name('delete');

});

require __DIR__.'/auth.php';
