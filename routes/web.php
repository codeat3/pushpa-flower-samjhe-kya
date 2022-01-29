<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\MemeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index']);
Route::get('/random', [HomepageController::class, 'random']);
Route::get('/meme/{slug}.jpg', MemeController::class)->name('meme');
