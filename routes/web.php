<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// To see all routes
// php artisan route:list --except-vendor

// Route::get('/', function () {
//     return view('home');
// });

Route::view('/', 'home');

// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::post('/jobs', 'store');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });

// Route resource does the same for jobs as above
// all action names follow defaults eg "show", "destroy", "index"
Route::resource('jobs', JobController::class);


// We can whitelist via 'only' and blacklist via 'except'
// Route::resource('jobs', JobController::class, [
//     'except' => ['edit']
// ]);

// Route::resource('jobs', JobController::class, [
//     'only' => ['index', 'show']
// ]);

Route::view('/contact', 'contact');