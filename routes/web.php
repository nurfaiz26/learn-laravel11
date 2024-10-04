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
    $jobs = Job::with('employer')->latest()->cursorPaginate(3);


    return view('jobs.index', [
        "jobs" => $jobs,

    ]);
    // return ["foo" => "boo"];
});

Route::post('/jobs', function() {
    // dd(request()->all());

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
       'title' => request('title'),
       'salary' => request('salary'),
       'employer_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {


    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
