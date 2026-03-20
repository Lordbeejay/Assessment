<?php

// Question 2 - Routing
// Route /dashboard to DashboardController@index, only for authenticated users

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// I used the 'auth' middleware here because it's Laravel's built-in way of checking
// if a user is logged in. If they're not authenticated, it redirects them to the
// login page automatically. So basically only logged-in users can access /dashboard.
