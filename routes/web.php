<?php

use App\Http\Controllers\ContactsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', 'ContactsController@create')->name('create');
// Route::get('/', 'ContactsController@create')->name('create');

// Route::get('/', [TodoController::class, 'index'])->name('todo.index');

Route::get('/', [ContactsController::class, 'create'])->name('create');
Route::post('/confirm', [ContactsController::class, 'confirm'])->name('confirm');
Route::post('/process', [ContactsController::class, 'process'])->name('process');
Route::get('/return_input', [ContactsController::class, 'returnInput'])->name('return');
Route::get('/complete', [ContactsController::class, 'complete'])->name('complete');
