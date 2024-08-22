<?php

//use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::apiResource('pages', PageController::class);
});
