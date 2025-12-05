<?php

use App\Http\Controllers\PostcodeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostcodeController::class, 'index']);
