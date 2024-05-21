<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class Job {
    public static function all(): array{
        return [['id' => 1, 'title' => 'Director', 'salary' => '$50,000'], ['id' => 2, 'title' => 'Janitor', 'salary' => '$10,000'], ['id' => 3, 'title' => 'Security', 'salary' => '$20,000']];

    }
}


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function ()  {
    return view('jobs', ['jobs' => Job::all()]);
});

Route::get('/jobs/{id}', function ($id) {
    // die dump
    // dd($id);

// Use short closure to access $id from above
// closures use a similar style to JavaScript's arrow function but need "fn" at the start
   $job = Arr::first(Job::all(), fn($job)=> $job['id'] == $id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});