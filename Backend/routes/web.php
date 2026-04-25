<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('home', ['title'=>'SIDAGAS']);
});

Route::get('/login', function () {
    return view('auth.login');
});


// Web Route Access
Route::get('/TentangKami', function () {
    try {
        $response = Http::timeout(3)->get('http://127.0.0.1:8005/customers');
        $customerCount = $response->successful() ? count($response->json()) : 0;
    } catch (\Exception $e) {
        $customerCount = 0;
    }
    
    return view('Web.TentangKami', ['title'=>'Tentang Kami | SIDAGAS', 'customerCount' => $customerCount]);
});

Route::get('/Blog', function () {
    return view('Web.Blog', ['title'=>'SIDAGAS']);
});

Route::get('/Produk', function () {
    try {
        $response = Http::timeout(3)->get('http://127.0.0.1:8005/products');
        $products = $response->successful() ? $response->json() : [];
    } catch (\Exception $e) {
        $products = [];
    }
    
    return view('Web.Produk', ['title'=>'Produk | SIDAGAS', 'products' => $products]);
});

Route::get('/Kontak', function () {
    return view('Web.Kontak');
});

// App Rout
Route::get('/Dashboard', function () {
    return view('app.Dashboard');
});