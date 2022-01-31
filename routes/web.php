<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\MemeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index']);
Route::get('/random', [HomepageController::class, 'random'])->name('random-meme');
Route::get('/meme/{slug}.jpg', [MemeController::class, 'image'])->name('meme-image');
Route::get('/{slug}', [HomepageController::class, 'meme'])->name('meme');

