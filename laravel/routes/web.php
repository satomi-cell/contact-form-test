<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('home');

// 商品一覧
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// 商品検索
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

// 商品登録ページ
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// 商品登録処理
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// 商品詳細(編集)
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// 商品更新(detail画面から送信）
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

// 商品削除
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');