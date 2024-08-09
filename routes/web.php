<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/plan', [AppController::class,'PlanningPage']);