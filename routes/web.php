<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('Product.home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/Contact',function(){
        return view('contact');
    })->name('Contact');
    Route::get('/dashboard',[HomeController::class, 'home'])->name('dashboard');
    Route::get('/Product/add-to-cart/{id}', [ProductController::class, 'addCart'])->name('addCart');
    Route::get('/Product/show-to-cart', [ProductController::class, 'showCart'])->name('showCart');
    Route::post('/Product/update-to-cart', [ProductController::class, 'updateCart'])->name('updateCart');
    Route::get('/Product/delete-to-cart', [ProductController::class, 'deleteCart'])->name('deleteCart');

    Route::get('/history_order', [HistoryController::class, 'index'])->name('history_order');
    Route::get('/order_detail/{id}', [HistoryController::class, 'orderDetail'])->name('order_detail');
    // Route::post('/filter_price', [ProductController::class, 'filterPrice'])->name('Product.filterPrice');
    Route::resource('/Product', ProductController::class);
    
});
