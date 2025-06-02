<?php
// halaman beranda
Route::get('/', [\BerandaController::class, 'index']);
Route::get('/beranda', [\BerandaController::class, 'index']);

// halaman tentang
Route::get('/tentang', [\TentangController::class, 'index']);

// halaman diagnosa
Route::get('/diagnosa', [\DiagnosaController::class, 'index']);

// proses diagnosa
Route::post('/diagnosa', [DiagnosaController::class, 'proses']);

// hasil diagnosa
Route::get('/diagnosa/hasil', [\DiagnosaController::class, 'hasil']);

// halaman login
Route::get('/login', [\AuthController::class, 'login']);
Route::post('/login', [\AuthController::class, 'proses_login']);

// halaman daftar
Route::get('/daftar', [\AuthController::class, 'daftar']);
Route::post('/daftar', [\AuthController::class, 'proses_daftar']);

// halaman logout
Route::post('/logout', [\AuthController::class, 'logout']);

// halaman dashboard user
Route::get('/dashboard', [\DashboardController::class, 'index']);