<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Get Routes
Route::view('/', 'welcome')->name('home');


// Name Routes
Route::view('/contact', 'contact')->name('contact');
//Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
//Route::get('/blog/create', [PostController::class, 'create'])->name('posts.create');
//Route::post('/blog', [PostController::class, 'store'])->name('posts.store');
//Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');
//Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
//Route::patch('/blog/{post}', [PostController::class, 'update'])->name('posts.update');
//Route::delete('/blog/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::resource('blog', PostController::class, [
    'names' => 'posts',
    'parameters' => ['blog' => 'post']
]);

Route::view('/about', 'about')->name('about');

Route::get('/login', function () {
    return 'Login Page';
})->name('login');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');


/*
 * Other Routes
 *
 * Route::post
 * Route::put
 * Route::patch
 * Route::delete
 *
 */

/*
 * Response to more requests
 *
 * Route::match(['put', 'patch'], '/', function(){
 *
 * });
 */

/*
 * Response to all requests
 *
 * Route::any('', function(){
 *
 * });
 */
