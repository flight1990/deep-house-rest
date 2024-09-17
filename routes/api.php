<?php

use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\CarouselController as AdminCarouselController;
use App\Http\Controllers\Admin\MediaController as AdminMediaController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SeoController as AdminSeoController;

use App\Http\Controllers\Guest\FaqController as GuestFaqController;
use App\Http\Controllers\Guest\CarouselController as GuestCarouselController;
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
        Route::apiResource('faqs', AdminFaqController::class);
        Route::apiResource('carousels', AdminCarouselController::class);
        Route::apiResource('media', AdminMediaController::class)->only(['index', 'store', 'destroy']);
        Route::apiResource('reviews', AdminReviewController::class);
        Route::apiResource('categories', AdminCategoryController::class);
        Route::apiResource('pages', AdminPageController::class);
        Route::apiResource('users', AdminUserController::class);
        Route::apiResource('menu', AdminMenuController::class);
        Route::apiResource('products', AdminProductController::class);
        Route::apiResource('seo', AdminSeoController::class);
    });

    Route::apiResource('faqs', GuestFaqController::class)->only(['index']);
    Route::apiResource('carousels', GuestCarouselController::class)->only(['index']);
    Route::apiResource('reviews', GuestReviewController::class)->only(['index', 'show']);
    Route::apiResource('categories', GuestCategoryController::class)->only(['index', 'show']);
    Route::apiResource('pages', GuestPageController::class)->only(['index', 'show']);
    Route::apiResource('menu', GuestMenuController::class)->only(['index']);
    Route::apiResource('products', GuestProductController::class)->only(['index', 'show']);
});
