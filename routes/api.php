<?php

use App\Containers\Auth\Controllers\LoginController;
use App\Containers\Auth\Controllers\RegisterController;
use App\Containers\Carousels\Controllers\AdminCarouselController;
use App\Containers\Carousels\Controllers\CarouselController;
use App\Containers\Categories\Controllers\AdminCategoryController;
use App\Containers\Categories\Controllers\CategoryController;
use App\Containers\Faqs\Controllers\AdminFaqController;
use App\Containers\Faqs\Controllers\FaqController;
use App\Containers\Menu\Controllers\AdminMenuController;
use App\Containers\Menu\Controllers\MenuController;
use App\Containers\Products\Controllers\AdminProductController;
use App\Containers\Products\Controllers\ProductController;
use App\Containers\Pages\Controllers\AdminPageController;
use App\Containers\Pages\Controllers\PageController;
use App\Containers\Reviews\Controllers\AdminReviewController;
use App\Containers\Reviews\Controllers\ReviewController;
use App\Containers\Seo\Controllers\AdminSeoController;
use App\Containers\Media\Controllers\AdminMediaController;
use App\Containers\Users\Controllers\AdminUserController;
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

    Route::apiResource('faqs', FaqController::class)->only(['index']);
    Route::apiResource('carousels', CarouselController::class)->only(['index']);
    Route::apiResource('reviews', ReviewController::class)->only(['index', 'store']);
    Route::apiResource('categories', CategoryController::class)->only(['index', 'show']);
    Route::apiResource('pages', PageController::class)->only(['index', 'show']);
    Route::apiResource('menu', MenuController::class)->only(['index']);
    Route::apiResource('products', ProductController::class)->only(['index', 'show']);
});
