<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\AuthController;
Route::get('/auth/signin', [AuthController::class, 'signin'])->name('auth.signin')->middleware('check.user.status');
Route::get('/auth/signup', [AuthController::class, 'signup'])->middleware('check.user.status');
Route::post('/auth/create-user', [AuthController::class, 'createUser'])->name('auth.createUser');
Route::post('/auth/check-user', [AuthController::class, 'checkUser'])->name('auth.checkUser');
Route::get('/home', [AuthController::class, 'home'])->middleware('user.check');
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/reset-password', [AuthController::class, 'resetPassword'])->name('auth.reset-password');
Route::post('/set-reset-input-cookie', [AuthController::class, 'setResetInputCookie'])->name('auth.set-reset-input-cookie');


use \App\Http\Controllers\PostController;
Route::resource('posts', PostController::class);

Route::get('/user-details', function() {
    $user = Session::get('user');
    return view('user', array(
        'userid' => $user[0],
        'useremail' => $user[1],
        'username' => $user[2]
    ));
});

use \App\Http\Controllers\FuncController;
Route::post('/find-post-by-search', [FuncController::class, 'findPostsBySearch']);
Route::get('/my-posts', [FuncController::class, 'findUserPosts']);
Route::get('/delete-account', [FuncController::class, 'deleteUserAccount']);


Route::get('/', function() {
    return view('home');
});