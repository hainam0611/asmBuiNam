<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;

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

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'store'])->name('products.store');
Route::post('products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::resource('products', ProductController::class)->except(['update']);
Route::get('/products/show/{id}', [ProductController::class, 'show']);

Route::get('/shop', [ProductController::class, 'shop'])->name('products.shop');


Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/products/catindex/{category}', [CategoryController::class, 'show2'])->name('products.catindex');

Route::get('/admin', [AdminController::class, 'index'])->name('adminIndex');
Route::get('/admin/products', [ProductController::class, 'index2'])->name('admin.products.index');
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

Route::get('/cart', [CartController::class, 'index'])->name('products.cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');















