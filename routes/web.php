<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    $jobs = Job::all();
    dd($jobs);

    //return view('home');
});

Route::get('/jobs', function ()  {
    return view('jobs', ['jobs' => Job::all()]);
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