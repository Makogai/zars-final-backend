<?php

use App\Http\Controllers\Api\V1\Admin\BlogApiController;
use App\Http\Controllers\Api\V1\Admin\CategoryApiController;
use App\Http\Controllers\Api\V1\Admin\LocationApiController;
use App\Http\Controllers\Api\V1\Admin\ReviewApiController;

//Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
Route::group(['prefix' => 'v1', 'as' => 'api.'], function () {
    // Location
    Route::post('locations/media', [LocationApiController::class, 'storeMedia'])->name('locations.store_media');
    Route::apiResource('locations', LocationApiController::class);

    Route::get('home-places', [LocationApiController::class, 'homePlaces'])->name('locations.home_places');
    Route::post('add-review', [LocationApiController::class, 'addReview'])->name('locations.add_review');
    // Category
    Route::apiResource('categories', CategoryApiController::class);

    // Review
    Route::apiResource('reviews', ReviewApiController::class);

    // Blog
    Route::post('blogs/media', [BlogApiController::class, 'storeMedia'])->name('blogs.store_media');
    Route::apiResource('blogs', BlogApiController::class);
});


//Route::get('v1/locations', [LocationApiController::class, 'index'])->name('locations.index');
//Route::get('v1/locations/{location}', [LocationApiController::class, 'show'])->name('locations.show');
