<?php

use Illuminate\Support\Facades\Route;

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

Route::get('produk/{namaProduk}', function($p) {
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
