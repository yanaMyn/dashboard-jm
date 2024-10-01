<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('pages.dashboard', ['type_menu' => 'dashboard']);
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('pages.dashboard', ['type_menu' => 'dashboard']);
})->name('dashboard');

// Route::get('/user/list', function () {
//     return view('pages.list-user', ['type_menu' => 'user']);
// })->name('list-user');

Route::get('/user/add', function () {
    return view('pages.add-user', ['type_menu' => 'user']);
})->name('add.user');

Route::get('/user/list', [UserController::class, 'show'])
    ->name('list.user');

Route::post('/user/save', [UserController::class, 'save'])
    ->name('save.user');

Route::delete('/user/delete/{id}', [UserController::class, 'delete'])
    ->name('delete.user');
