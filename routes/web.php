<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Legislation;

Route::get('{type}', [Legislation\TypesController::class, 'view']);
