<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class);

Route::get('/gallery', GalleryController::class);
Route::get('/facility', FacilityController::class);

Route::get('/news/show/{slug}', [NewsController::class, 'show'])->name('news.show');