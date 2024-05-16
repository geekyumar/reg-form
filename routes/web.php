<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::post('/validate', [FormController::class, 'validateForm'])->withoutMiddleware(['web', 'csrf']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function(){
    return view('form');
});