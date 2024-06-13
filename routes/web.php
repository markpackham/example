<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// To see all routes
// php artisan route:list --except-vendor

Route::get('test', function () {
    return new \App\Mail\JobPosted();
});

// Route::get('/', function () {
//     return view('home');
// });

Route::view('/', 'home');

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::get('/jobs/{job}', 'show');
    Route::post('/jobs', 'store')->middleware('auth');
    // Use Middleware so only job creator can edit/update/destroy job they made
    // Route::get('/jobs/{job}/edit', 'edit')->middleware(['auth', 'can:edit-job,job']);

    // Use Policy from JobPolicy instead of Gate from AppServiceProvider, so instead of "edit-job" we use "edit"
    // Route::get('/jobs/{job}/edit', 'edit')->middleware('auth')->can('edit-job', 'job');
    Route::get('/jobs/{job}/edit', 'edit')->middleware('auth')->can('edit', 'job');


    Route::patch('/jobs/{job}', 'update')->middleware('auth')->can('edit-job', 'job');
    Route::delete('/jobs/{job}', 'destroy')->middleware('auth')->can('edit-job', 'job');
});

// Route resource does the same for jobs as above
// all action names follow defaults eg "show", "destroy", "index"
// Route::resource('jobs', JobController::class)->only(['index', 'show']);
// Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware('auth');


// We can whitelist via 'only' and blacklist via 'except'
// Route::resource('jobs', JobController::class, [
//     'except' => ['edit']
// ]);

// Route::resource('jobs', JobController::class, [
//     'only' => ['index', 'show']
// ]);

Route::view('/contact', 'contact');

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Make login a named route
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);