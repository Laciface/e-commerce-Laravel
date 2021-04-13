<?php

use App\Http\Controllers\AdminProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', [ProductController::class, 'index'])->name('allProducts');
Route::get('product/addToCart/{id}', [ProductController::class, 'addProductToCart'])->name('AddToCartProduct');
Route::get('cart', [ProductController::class, 'showCart'])->name('cartProducts');
Route::get('clear', [ProductController::class, 'clearCart'])->name('clearCart');

//delete item from cart

Route::get('product/deleteItemFromCart/{id}', [ProductController::class, 'deleteItemFromCart'])->name('deleteItemFromCart');


//admin panel

Route::get('admin',[ProductController::class, 'openAdmin'])->name('openAdmin');

Route::get('admin/products',[AdminProductsController::class, 'index'])->name('adminDisplayProducts');

//display edit product form

Route::get('admin/editProductForm/{id}',[AdminProductsController::class, 'editProductForm'])->name('adminEditProductForm');

//display edit product image form
Route::get('admin/editProductImageForm/{id}',[AdminProductsController::class, 'editProductImageForm'])->name('adminEditProductImageForm');


// update product
Route::post('admin/updateProduct/{id}', [AdminProductsController::class, 'updateProduct'])->name('adminUpdateProduct');

// update product image
Route::post('admin/updateProductImage/{id}', [AdminProductsController::class, 'updateProductImage'])->name('adminUpdateProductImage');

//display create product form
Route::get('admin/createProductForm',[AdminProductsController::class, 'createProductForm'])->name('adminCreateProductForm');

//insert product to database
Route::post('admin/insertProduct', [AdminProductsController::class, 'insertProduct'])->name('insertProduct');

//delete product
Route::get('admin/deleteProduct/{id}', [AdminProductsController::class, 'deleteProduct'])->name('deleteProduct');

