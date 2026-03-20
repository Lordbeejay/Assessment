<?php

// Question 1 - Eloquent Query
// Get all users whose status is 'active', ordered by created_at descending

$users = User::where('status', 'active')
    ->orderBy('created_at', 'desc')
    ->get();
