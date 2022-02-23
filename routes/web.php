<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

})->name('home');


Route::get('/endpoint', function () {

    return to_route('home');    // new in laravel 9

//    return redirect()->route('home');     // old method
});


Route::get('/users/{user}/posts/{post}', function (User $user, Post $post) {
    return $post;
})->scopeBindings();



                // New in larvel 9
//Route::controller(PostController::class)->group(function () {
//    Route::get('/posts', 'index');
//    Route::get('/posts/{post}', 'show');
//    Route::post('/posts', 'store');
//});
