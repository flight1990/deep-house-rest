<?php

use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SeoController as AdminSeoController;

use App\Http\Controllers\Guest\ReviewController as GuestReviewController;
use App\Http\Controllers\Guest\CategoryController as GuestCategoryController;
use App\Http\Controllers\Guest\PageController as GuestPageController;
use App\Http\Controllers\Guest\MenuController as GuestMenuController;
use App\Http\Controllers\Guest\ProductController as GuestProductController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::controller(RegisterController::class)->group(function () {
        Route::post('register', 'register');
    });

    Route::controller(LoginController::class)->group(function () {
        Route::post('login', 'login');

        Route::middleware('auth:sanctum')->group(function () {
            Route::get('user', 'user');
            Route::post('logout', 'logout');
        });
    });

    Route::prefix('admin')->group(function () {
        Route::apiResource('reviews', AdminReviewController::class);
        Route::apiResource('categories', AdminCategoryController::class);
        Route::apiResource('pages', AdminPageController::class);
        Route::apiResource('users', AdminUserController::class);
        Route::apiResource('menu', AdminMenuController::class);
        Route::apiResource('products', AdminProductController::class);
        Route::apiResource('seo', AdminSeoController::class);
    });

    Route::controller(GuestReviewController::class)->prefix('reviews')->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
    });

    Route::controller(GuestCategoryController::class)->prefix('categories')->group(function () {
        Route::get('/', 'index');
        Route::get('/{slug}', 'show');
    });

    Route::controller(GuestPageController::class)->prefix('pages')->group(function () {
        Route::get('/{slug}', 'show');
    });

    Route::controller(GuestMenuController::class)->prefix('menu')->group(function () {
        Route::get('/', 'index');
    });

    Route::controller(GuestProductController::class)->prefix('products')->group(function () {
        Route::get('/', 'index');
        Route::get('/{slug}', 'show');
    });
});
