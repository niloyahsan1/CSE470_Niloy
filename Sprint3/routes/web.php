<?php

use App\Http\Controllers\Consultant;
use App\Http\Controllers\Home;
use App\Http\Controllers\TEST;
use App\Http\Controllers\loginauth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DietTableController;
use App\Http\Controllers\DailyActivityController;

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


// Profile Routes
Route::get('/profile', [ProfileController::class, 'showProfileForm'])->name('profile_show');
Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profile_update');
Route::get('/UserProfile', [ProfileController::class, 'profile_done'])->name('profile_done');

// Goal Routes
Route::get('/goal', [GoalController::class, 'showGoalForm'])->name('goal.show');
Route::post('/goal', [GoalController::class, 'setGoal'])->name('goal.set');

// Goal done kore show korbee
Route::get('/goaldone', [GoalController::class, 'goaldone'])->name('goaldekho');

// goal update korbee
Route::get('/updatedone', [GoalController::class, 'notungoal'])->name('notungoal');


// daily activity show er jonno
Route::get('/dailyactivity', [DailyActivityController::class, 'dailyactivity'])->name('dailyactivity');


// Diet Chart Show
Route::get('/diet-table', [DietTableController::class, 'showTable'])->name('table');


// coming the ddc table from customer honme pagfee
Route::get('/ddctablee', function () {
    return view('ddc');
})->name('ddcshow');



Route::get('/consultantform', [Consultant::class, 'showconsultantform'])->name('showconsultantform');
Route::post('/consultantion', [Consultant::class, 'appo'])->name('appo');




Route::get('/localhome', function () {
    return view('local_home');
})->name('logout');



