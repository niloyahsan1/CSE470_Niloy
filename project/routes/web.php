<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\TEST;
use App\Http\Controllers\loginauth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DietTableController;

// localhome route
Route::get('/', function () {
    return view('local_home');
});

Route::match(['get', 'post'], '/login', function () {
        return view('login');
    })->name('login');
    
    

// login route
Route::get('/customer', [loginauth::class, 'show_home'])->name('home');

Route::match(['get', 'post'], '/loginauth', [loginauth::class, 'auth'])->name('loginauth');

Route::match(['get', 'post'], '/signup', function () {
    return view('signup');
})->name('signup-show');

Route::post('/signupaa', [loginauth::class, 'sign'])->name('usersignup');


// Diet Chart Show
Route::get('/diet-table', [DietTableController::class, 'showTable'])->name('table');

// logout route
Route::get('/localhome', function () {
    return view('local_home');
})->name('logout');



