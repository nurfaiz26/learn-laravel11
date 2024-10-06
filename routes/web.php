<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;


// Route::get('/', function () {
//     return view('home', [
//         'greeting' => 'Hello',
//         'name' => 'Faiz',

//     ]);
// });
Route::view('/', 'home');

// index
// Route::get('/jobs', function () {
// lazyquery
// $jobs = Job::with('employer')->get();

// with pagination
// $jobs = Job::with('employer')->paginate(3);
// $jobs = Job::with('employer')->simplePaginate(3);
// $jobs = Job::with('employer')->latest()->cursorPaginate(3);


// return view('jobs.index', [
//     "jobs" => $jobs,

// ]);
// // return ["foo" => "boo"];
// });
// Route::get('/jobs', [JobController::class, 'index']); // using controller

// store
// Route::post('/jobs', function () {
//     // dd(request()->all());

//     request()->validate([
//         'title' => ['required', 'min:3'],
//         'salary' => ['required']
//     ]);

//     Job::create([
//         'title' => request('title'),
//         'salary' => request('salary'),
//         'employer_id' => 1
//     ]);

//     return redirect('/jobs');
// });
// Route::post('/jobs', [JobController::class, 'store']);

// create
// Route::get('/jobs/create', function () {
//     return view('jobs.create');
// });
// Route::get('/jobs/create', [JobController::class, 'create']);

// show
// Route::get('/jobs/{id}', function ($id) { // using reguler route
//     $job = Job::find($id);

//     return view('jobs.show', ['job' => $job]);
// });
// Route::get('/jobs/{job}', function (Job $job) { // using route modeling
//     return view('jobs.show', ['job' => $job]);
// });
// Route::get('/jobs/{job}', [JobController::class, 'show']);

// edit
// Route::get('/jobs/{job}/edit', function (Job $job) {
//     return view('jobs.edit', ['job' => $job]);
// });
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

// patch
// Route::patch('/jobs/{job}', function (Job $job) {
//     // validate
//     request()->validate([
//         'title' => ['required', 'min:3'],
//         'salary' => ['required']
//     ]);

//     // authorize
//     // update the job and persist
//     // $job = Job::findOrFail($id); // for the query never null

//     // $job->title = request('title');
//     // $job->title = request('salary');
//     // $job->save();

//     $job->update([
//         'title' => request('title'),
//         'salary' => request('salary'),
//     ]);

//     // where to redirect
//     return redirect('/jobs/' . $job->id);
// });
// Route::patch('/jobs/{job}', [JobController::class, 'update']);

// destroy
// Route::delete('/jobs/{job}', function (Job $job) {
//     // authorize

//     // delete the job
//     // $job = Job::findOrFail($id)->delete();
//     $job->delete();

//     // redirect
//     return redirect('/jobs');
// });
// Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

// Route::get('/contact', function () {
//     return view('contact');
// });
Route::view('/contact', 'contact');

// job routes group method
// Route::controller(JobController::class)->group(function () {
//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}', 'show');
//     Route::get('/jobs/{job}', 'show');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::post('/jobs', 'store');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
// });

// route resources method
Route::resource('jobs' , JobController::class, [
    // 'only' => ['edit']
    // 'except' => ['edit']
]);


// auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
