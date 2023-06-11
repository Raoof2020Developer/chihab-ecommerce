<?php

use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Models\Product;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $products = Product::all();
    return view('welcome', compact('products'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function() {
    return view('admin.index');
})->middleware('auth');

Route::get('/admin/products', [ProductsController::class, 'index'])->name('admin.products.index');
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');
Route::get('/admin/products/create', [ProductsController::class, 'create'])->name('admin.products.create');

Route::post('/admin/products/description', [DescriptionController::class, 'add'])->name('description.add');
Route::any('/image-upload', [DescriptionController::class, 'imageUpload'])->name('image.upload');

Route::post('/admin/products/', [ProductsController::class, 'store'])->name('admin.products.store');
Route::delete('/admin/products/{product}', [ProductsController::class, 'destroy'])->name('admin.products.destroy');
Route::get('admin/products/{product}/edit', [ProductsController::class, 'edit'])->name('admin.products.edit');
Route::patch('admin/products/{product}/', [ProductsController::class, 'update'])->name('admin.products.update');

Route::get('/admin/orders', [OrdersController::class, 'index'])->middleware('auth')->name('admin.orders');
Route::post('/admin/orders', [OrdersController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}', [OrdersController::class, 'message'])->name('orders.message');
Route::delete('/orders/{order}', [OrdersController::class, 'destroy'])->name('orders.destroy');

Route::get('/storagelink' , function() {
    Artisan::call('storage:link');
});