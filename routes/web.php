<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

// redirect home to clients page
Route::get('/', function () {
    return redirect()->route('clients.index');
});

// client routes
Route::resource('clients', ClientController::class);
