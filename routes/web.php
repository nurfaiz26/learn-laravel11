<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello',
        'name' => 'Faiz',

    ]);
});

Route::get('/jobs', function () {
    // lazyquery
    // $jobs = Job::with('employer')->get();

    // with pagination
    // $jobs = Job::with('employer')->paginate(3);
    // $jobs = Job::with('employer')->simplePaginate(3);
    $jobs = Job::with('employer')->cursorPaginate(3);


    return view('jobs', [
        "jobs" => $jobs,

    ]);
    // return ["foo" => "boo"];
});

Route::get('/jobs/{id}', function ($id) {


    $job = Job::find($id);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
