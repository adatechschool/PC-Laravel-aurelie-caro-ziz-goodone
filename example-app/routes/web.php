<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('/articles', ArticleController::class);
Route::resource('/users', UserController::class);

// Profile

// Route::resource('users')->group(function () {
//     Route::view('show', 'users.show');
//     Route::name('profile')->put('profile', [UserController::class, 'index']);
// });

Route::middleware('auth')->group(function () {
    Route::view('profile', 'auth.profile');
    Route::name('profile')->put('profile', [RegisteredUserController::class, 'update']);
});


//photos
// Route::get('/photos', function () {
    
// })->name('storage.app.photos');
