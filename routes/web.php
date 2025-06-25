<?php

// import controller
use App\Http\Controllers\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;




// Route::get('/', function () {
//     return view('layouts.frontend');
// });

// Route basic

// Route::get('about', function () {
//     return "ini halaman about";
// });

// Route::get('profile', function () {
//     return view('profile');
// });

// // Route Parameters

// Route::get('produk/{namaProduk}', function ($p) {
//     return 'saya membeli ' . $p;
// });

// Route::get('kategori/{namaKategori}', function ($kategori) {
//     return view('kategori', compact('kategori'));
// });

// //Route Optional Parameter

// Route::get('search/{keyword?}', function ($key = null) {
//     return view('search', compact('key'));
// });

// Route::get('toko/{barang?}/{promo?}', function ($barang = null, $promo = null) {
//     return view('toko', compact('barang', 'promo'));
// }
// );

// // Route Buku

// Route::get('buku', [MyController::class, 'index']);

// // tambah buku
// Route::get('buku/create', [MyController::class, 'create'])->name('buku.create');
// Route::post('buku', [MyController::class, 'store']);

// // show
// Route::get('buku/{id}', [MyController::class, 'show']);

// // edit & update
// Route::get('buku/{id}/edit', [MyController::class, 'edit']);
// Route::put('buku/{id}', [MyController::class, 'update']);

// // delete
// Route::delete('buku/{id}', [MyController::class, 'destroy']);

Route::get('/', [FrontendController::class, 'index']);

// product
Route::get('/product', [FrontendController::class, 'product'])->name('product.index');
Route::get('/product/{id}', [FrontendController::class, 'singleProduct'])->name('product.show');
Route::get('/product/{slug}', [FrontendController::class, 'filterByCategory'])->name('product.filter');
Route::get('/search', [FrontendController::class, 'search'])->name('product.search');


Route::get('/about', [FrontendController::class, 'about']);

// cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route untuk admin / backend
Route::group(['prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', Admin::class]], function () {
    Route::get('/', [BackendController::class, 'index']);
    // crud
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);

});