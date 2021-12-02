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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

});

Route::prefix('user')->middleware('auth')->group(function () {

     Route::get('profile/index', [\App\Http\Controllers\user\ProfileController::class,'index'] )->name('profile.index');
     Route::get('profile/changepassword',[\App\Http\Controllers\user\ProfileController::class,'changePassword'])->name('profile.changepassword');
     Route::patch('profile/changepassword',[\App\Http\Controllers\user\ProfileController::class,'changePasswordStore'])->name('profile.changepassword.store');

     Route::post('cart/item/add',[\App\Http\Controllers\user\CartItemController::class,'store'])->name('cartitem.store');
     Route::get('cart/item/delete/{cartItem}',[\App\Http\Controllers\user\CartItemController::class,'destroy'])->name('cartitem.delete');
     Route::get('cart',[\App\Http\Controllers\user\CartController::class,'index'])->name('cart.index');
     Route::post('cart/factor',[\App\Http\Controllers\user\CartController::class,'factor'])->name('cart.factor');

     Route::post('profile/updatepostalcode',[\App\Http\Controllers\user\ProfileController::class,'updatePostalCode'])->name('profile.postalcode.update');
     Route::post('profile/updateaddress',[\App\Http\Controllers\user\ProfileController::class,'updateAddress'])->name('profile.address.update');
     Route::get('profile/address/edit',[\App\Http\Controllers\user\ProfileController::class,'editAddress'])->name('profile.address.edit');


    Route::get('orders',[\App\Http\Controllers\user\OrderController::class,'index'])->name('orders.index');
    Route::post('orders',[\App\Http\Controllers\user\OrderController::class,'store'])->name('orders.store');

     Route::get('orders/pay/{order}',[\App\Http\Controllers\user\OrderController::class,'pay'])->name('orders.pay');
     Route::get('orders/verify', [\App\Http\Controllers\user\OrderController::class,'verify'] )->name('orders.verify');
     Route::get('orders/factor/{order}', [\App\Http\Controllers\user\OrderController::class,'factor'] )->name('orders.factor');


});

Route::resource('products',\App\Http\Controllers\ProductController::class);
Route::resource('categories',\App\Http\Controllers\CategoryController::class);

Route::get('product/comments/sortbylike',[\App\Http\Controllers\ProductController::class,'sortByLike'])->name('comments.sortbylike');
Route::get('product/comments/sortbydate',[\App\Http\Controllers\ProductController::class,'sortByDate'])->name('comments.sortbydate');

Route::group([
    'middleware' => 'auth'
],function (){

    Route::post('comments/store',[\App\Http\Controllers\user\CommentController::class,'store'])
        ->name('comments.store');

    Route::get('likes/store',[\App\Http\Controllers\user\LikeController::class,'store'])
        ->name('likes.store');

    Route::get('dislikes/store',[\App\Http\Controllers\user\DisLikeController::class,'store'])
        ->name('dislikes.store');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


