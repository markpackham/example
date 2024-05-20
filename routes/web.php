<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', ['jobs' => [['title' => 'Director', 'salary' => '$50,000'], ['title' => 'Janitor', 'salary' => '$10,000'], ['title' => 'Security', 'salary' => '$20,000']]]);
});

Route::get('/contact', function () {
    return view('contact');
});
