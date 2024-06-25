<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\ProductController;

Route::get('/', function () {
    return view('client.pages.welcome');
});

Route::prefix('dashboard')->name('d.')->group(function() {
    Route::get('/', function() {
        return view('dashboard.pages.index');
    })->name('index');

    Route::prefix('user')->name('user-')->group(function() {
        Route::get('/user-client', [UserController::class, 'listAllClients'])->name('client');
        Route::get('/user-admin', [UserController::class, 'listAllAdmins'])->name('admin');

        Route::post('/create-account', [UserController::class, 'createAccount'])->name('create');

        Route::put('/update-user/{id}', [UserController::class, 'updateAccount'])->name('update');
        Route::delete('/delete-user/{id}', [UserController::class, 'deleteAccount'])->name('delete');
    });

    Route::prefix('product')->name('product-')->group(function() {
        Route::get('/', [ProductController::class, 'listAllProducts'])->name('list');
        Route::post('/', [ProductController::class, 'createProduct'])->name('create');
        Route::put('/update-product/{id}', [ProductController::class, 'updateProduct'])->name('update');
        Route::delete('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete');

        Route::get('/category', [ProductController::class, 'listAllCategories'])->name('category');
        Route::post('/category', [ProductController::class, 'createCategory'])->name('create-cate');
        Route::put('/update-category/{id}', [ProductController::class, 'updateCategory'])->name('update-cate');
        Route::delete('/delete-category/{id}', [ProductController::class, 'deleteCategory'])->name('delete-cate');
    });

});