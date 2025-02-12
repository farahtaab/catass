<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatImageController;

Route::get('/', [CatImageController::class, 'index']);

