<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ConfirmationController;



Route::get('/',[ShopController::class,'index'])->name('shop.index');


Route::get('products/{product}',[ProductController::class,'show'])->name('products.show');
Route::get('products/',[ProductController::class,'index'])->name('products.index');


Route::get('cart',[CartController::class,'index'])->name('cart.index');
Route::post('cart',[CartController::class,'store'])->name('cart.store');
Route::delete('cart/{item}',[CartController::class,'destroy'])->name('cart.destroy');
Route::post('cart/MoveToCart/{item}',[CartController::class,'MoveToCart'])->name('cart.MoveToCart');
Route::post('cart/saveForLater/{item}',[CartController::class,'saveForLater'])->name('cart.saveForLater');

Route::delete('cart/delete/all',[CartController::class, 'deleteAll'])->name("cart.deleteAll");

Route::delete('cart/SaveLatar/item/{item}',[CartController::class,'destroySaveLater'])->name('cart.destroySaveLater');


Route::get('empty',function(){
    Cart::instance('default')->destroy();
});

Route::view('contact','contact');
Route::get('thankyou',[ConfirmationController::class, 'thankYou'])->name('confirmation.thankYou');


Route::get('checkout', [ConfirmationController::class,'index'])->name('confirmation.index');
Route::post('checkout', [ConfirmationController::class,'store'])->name('confirmation.store');
