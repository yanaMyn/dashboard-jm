<?php

use App\Http\Controllers\Authentication\AuthController;
use App\Http\Middleware\AuthenticationMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//Authentication
Route::get('/', [AuthController::class, 'index'])
    ->name('login.index');

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout.user');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.user');


Route::middleware(['auth'])->group(function () {
    //User
    Route::get('/dashboard', function () {
        return view('pages.dashboard', ['type_menu' => 'dashboard']);
    })->name('dashboard');

    Route::middleware(['AuthenticationMiddleware'])->group(function () {
        //CRUD
        Route::get('/user/add', function () {
            return view('pages.add-user', ['type_menu' => 'user']);
        })->name('add.user');

        Route::get('/user/list', [UserController::class, 'show'])
            ->name('list.user');

        Route::post('/user/save', [UserController::class, 'save'])
            ->name('save.user');

        Route::delete('/user/delete/{id}', [UserController::class, 'delete'])
            ->name('delete.user');

        Route::get('/user/{id}/edit', [UserController::class, 'edit'])
            ->name('edit.user');

        Route::patch('/user/{id}', [UserController::class, 'update'])
            ->name('update.user');
    });
});

