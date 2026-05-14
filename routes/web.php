<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/siswa', function () {
    return view('siswa');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/galeri', function () {
    return view('galeri');
});
