<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Rute untuk menampilkan halaman login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Rute untuk memproses login
Route::post('/login', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    $correctUsername = 'BH2213';
    $correctPassword = '3101';

    // Cek apakah username dan password yang dimasukkan benar
    if ($username === $correctUsername && $password === $correctPassword) {
        return redirect('/login')->with(['status' => 'success', 'message' => 'Login Berhasil!']);
    } else {
        return redirect('/login')->with(['status' => 'error', 'message' => 'Username atau Password Salah!']);
    }
})->name('login.process');

// Rute untuk menampilkan halaman brute force
Route::get('/bruteforce', function () {
    return view('bruteforce');
})->name('bruteforce');
