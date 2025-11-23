<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/connect', function () {
    return view('connect');
});
Route::get('/signup', function () {
    return view('signup');
});
