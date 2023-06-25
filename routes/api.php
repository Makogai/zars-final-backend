<?php

use App\Http\Controllers\Api\V1\Admin\BlogApiController;
use App\Http\Controllers\Api\V1\Admin\CategoryApiController;
use App\Http\Controllers\Api\V1\Admin\LocationApiController;
use App\Http\Controllers\Api\V1\Admin\ReviewApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Location
    Route::post('locations/media', [LocationApiController::class, 'storeMedia'])->name('locations.store_media');
    Route::apiResource('locations', LocationApiController::class)->except(['index']);

    // Category
    Route::apiResource('categories', CategoryApiController::class);

    // Review
    Route::apiResource('reviews', ReviewApiController::class);

    // Blog
    Route::post('blogs/media', [BlogApiController::class, 'storeMedia'])->name('blogs.store_media');
    Route::apiResource('blogs', BlogApiController::class);
});


Route::get('v1/locations', [LocationApiController::class, 'index'])->name('locations.index');
