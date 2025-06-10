<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutAwardController;
use App\Http\Controllers\AboutPeopleController;
use App\Http\Controllers\AboutContentController;
use App\Http\Controllers\ArticleDetailController;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\GlobalCategoryController;
use App\Http\Controllers\GlobalDetailController;
use App\Http\Controllers\HomeContentController;


Route::apiResource('article-detail', ArticleDetailController::class);
Route::apiResource('article-category', ArticleCategoryController::class);
Route::apiResource('global-category', GlobalCategoryController::class);
Route::apiResource('global-detail', GlobalDetailController::class);
Route::apiResource('about-award', AboutAwardController::class);
Route::apiResource('about-people', AboutPeopleController::class);
Route::apiResource('about-content', AboutContentController::class);
Route::apiResource('home-content', HomeContentController::class);