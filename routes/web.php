<?php

use App\Http\Controllers\MonsterController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [MonsterController::class, 'home'])->name('home');
Route::resource('monsters', MonsterController::class);