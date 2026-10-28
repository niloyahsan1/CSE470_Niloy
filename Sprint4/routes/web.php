<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\DailyActivityController;
use App\Http\Controllers\DietTableController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Landing Page
Route::get('/', function () {
    return view('local_home');
});

// Guest Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'auth'])->name('loginauth');

    Route::get('/signup', function () {
        return view('signup');
    })->name('signup-show');

    Route::post('/signup', [AuthController::class, 'sign'])->name('usersignup');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Customer Dashboard
    Route::get('/customer', [AuthController::class, 'show_home'])->name('home');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'showProfileForm'])->name('profile_show');
    Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profile_update');
    Route::get('/UserProfile', [ProfileController::class, 'profile_done'])->name('profile_done');

    // Goal Routes
    Route::get('/goal', [GoalController::class, 'showGoalForm'])->name('goal.show');
    Route::post('/goal', [GoalController::class, 'setGoal'])->name('goal.set');
    Route::get('/goaldone', [GoalController::class, 'goaldone'])->name('goaldekho');
    Route::get('/updatedone', [GoalController::class, 'notungoal'])->name('notungoal');

    // Daily Activity
    Route::get('/dailyactivity', [DailyActivityController::class, 'dailyactivity'])->name('dailyactivity');

    // Diet Table
    Route::get('/diet-table', [DietTableController::class, 'showTable'])->name('table');
    Route::get('/ddctablee', function () {
        return view('diet_chart');
    })->name('ddcshow');

    // Consultant Routes
    Route::get('/consultant-dashboard', [ConsultantController::class, 'dashboard'])->name('consultant.dashboard');
    Route::get('/consultantform', [ConsultantController::class, 'showconsultantform'])->name('showconsultantform');
    Route::post('/consultantion', [ConsultantController::class, 'appo'])->name('appo');

    // Logout
    Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');
});



