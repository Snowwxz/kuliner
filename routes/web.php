<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing_page');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    // Handle login logic here
    return redirect('/');
})->name('login.post');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function () {
    // Handle registration logic here
    return redirect()->route('login');
})->name('register.post');
