<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
    // return ["foo" => "boo"];
});


Route::get('/contact', function () {
    return view('contact');
});
