<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function ()  {
    // Use eager loading rather than lazy loading for better performance
    // use "with" with employer() method in Job class
    // had we used lazy loading then we'd have the N+1 problem
    // so the more records we added the more SQL queries would need to be run
    // making performance get progressively worse
    $jobs = Job::with('employer')->get();

    return view('jobs', ['jobs' => $jobs]);
});

Route::get('/jobs/{id}', function ($id) {
    // die dump
    // dd($id);

// Use short closure to access $id from above
// closures use a similar style to JavaScript's arrow function but need "fn" at the start
   $job = Job::find($id);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});