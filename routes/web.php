<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    // Use eager loading rather than lazy loading for better performance
    // use "with" with employer() method in Job class
    // had we used lazy loading then we'd have the N+1 problem
    // so the more records we added the more SQL queries would need to be run
    // making performance get progressively worse
    // previously we used Job::all()

    // Use pagination to save memory instead of get which fetches ALL, no limit
    //$jobs = Job::with('employer')->get();

    // Example of pagination query - http://127.0.0.1:8000/jobs?page=2
    // For performance reasons simplePaginate works better than paginate
    // but this offers only Previous & Next buttons
    //$jobs = Job::with('employer')->simplePaginate(3);

    // cursorPaginate means ugly links like this
    // http://127.0.0.1:8000/jobs?cursor=eyJqb2JfbGlzdGluZ3MuaWQiOjMsIl9wb2ludHNUb05leHRJdGVtcyI6dHJ1ZX0
    // but it is great if you can't stand people with web crawlers stealing your site data
    // by incrementing up predictable url paths
    // cursorPaginate works well for large data sets
    // $jobs = Job::with('employer')->cursorPaginate(3);

    $jobs = Job::with('employer')->paginate(3);

    // Before we made a "jobs" directory it was 
    // return view('jobs', ['jobs' => $jobs]);

    // You can use "." instead of "/" which is more common in Laravel for views directories
    //return view('jobs/index', ['jobs' => $jobs]);
    return view('jobs.index', ['jobs' => $jobs]);
});

// http://127.0.0.1:8000/jobs/create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('jobs/{id}', function ($id) {
    // die dump
    // dd($id);

    // Use short closure to access $id from above
    // closures use a similar style to JavaScript's arrow function but need "fn" at the start
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    // dd(request()->all());
    // dd(request('title'));

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});