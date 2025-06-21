<?php

// import controller
use App\Http\Controllers\BackendController;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;

Route::get('/', function () {
    return view('welcome');
});

// Route basic

Route::get('about', function () {
    return "ini halaman about";
});

Route::get('profile', function () {
    return view('profile');
});

// Route Parameters

Route::get('produk/{namaProduk}', function ($p) {
    return 'saya membeli ' . $p;
});

Route::get('kategori/{namaKategori}', function ($kategori) {
    return view('kategori', compact('kategori'));
});

//Route Optional Parameter

Route::get('search/{keyword?}', function ($key = null) {
    return view('search', compact('key'));
});

Route::get('toko/{barang?}/{promo?}', function ($barang = null, $promo = null) {
    return view('toko', compact('barang', 'promo'));
}
);

// Route Buku

Route::get('buku', [MyController::class, 'index']);

// tambah buku
Route::get('buku/create', [MyController::class, 'create'])->name('buku.create');
Route::post('buku', [MyController::class, 'store']);

// show
Route::get('buku/{id}', [MyController::class, 'show']);

// edit & update
Route::get('buku/{id}/edit', [MyController::class, 'edit']);
Route::put('buku/{id}', [MyController::class, 'update']);

// delete
Route::delete('buku/{id}', [MyController::class, 'destroy']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route untuk admin / backend
Route::group(['prefix' => 'admin', 'middleware' => ['auth', Admin::class]], function () {
    Route::get('/', [BackendController::class, 'index']);
});
