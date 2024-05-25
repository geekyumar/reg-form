<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Middleware\TestMiddleware;
use App\Http\Kernel;
use App\Models\Tenant;
use App\Http\Controllers\NewTenant;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;


Route::post('/validate', [FormController::class, 'validateForm'])->withoutMiddleware(['web', 'csrf']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function(){
    return view('form');
});

Route::get('/test', function(){
return class_exists(TestMiddleware::class) ? 'Middleware found' : 'Middleware not found';
});

Route::post('/create_tenant', [NewTenant::class, 'NewTenant'])->withoutMiddleware(['web', 'csrf']);

Route::middleware([TestMiddleware::class])->group(function () {
    Route::get('/tenant', function () {
        $tenant = Tenant::find(request()->header('X-Tenant-ID'));
        $connection = DB::connection()->getConfig();
        header('Content-type: Application/json');
        return response()->json($connection);
    });
});