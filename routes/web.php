<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('pages.dashboard', ['type_menu' => 'dashboard']);
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('pages.dashboard', ['type_menu' => 'dashboard']);
})->name('dashboard');

Route::get('/user/list', function () {
    return view('pages.user-list', ['type_menu' => 'user']);
})->name('list-user');

Route::get('/user/add', function () {
    return view('pages.user-add', ['type_menu' => 'user']);
})->name('add-user');
