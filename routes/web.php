<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CommentController;
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


Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

});

Route::prefix('user')->group(function () {

});

Route::resource('products',\App\Http\Controllers\ProductController::class);

Route::get('product/comments/sortbylike',[\App\Http\Controllers\ProductController::class,'sortByLike'])->name('comments.sortbylike');
Route::get('product/comments/sortbydate',[\App\Http\Controllers\ProductController::class,'sortByDate'])->name('comments.sortbydate');

Route::post('comments/store',[\App\Http\Controllers\user\CommentController::class,'store'])
    ->name('comments.store')->middleware('auth');

Route::get('likes/store',[\App\Http\Controllers\user\LikeController::class,'store'])
    ->name('likes.store')->middleware('auth');

Route::get('dislikes/store',[\App\Http\Controllers\user\DisLikeController::class,'store'])
    ->name('dislikes.store')->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


