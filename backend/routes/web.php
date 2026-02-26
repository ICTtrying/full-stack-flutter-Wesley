<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')
    ->middleware('api')
    ->group(function () {
        Route::get('/ping', function () { return ['message' => 'pong']; }); 
        
    });
