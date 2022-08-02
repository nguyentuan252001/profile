<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CauhinhController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProfileController::class, 'view']);

Route::get('/admin/login', [AccountController::class, 'viewLogin']);
Route::post('/admin/login', [AccountController::class, 'actionLogin']);

Route::group(['prefix' => '/admin', 'middleware' => 'accMidleware'], function () {

    Route::get('/logout', [AccountController::class, 'logout']);

    Route::group(['prefix' => '/config'], function () {
        Route::get('/', [CauhinhController::class, 'index']);
        Route::get('/data', [CauhinhController::class, 'data']);
        Route::post('/create', [CauhinhController::class, 'store']);
        Route::post('/update', [CauhinhController::class, 'update']);
        Route::post('/delete', [CauhinhController::class, 'destroy']);
    });

    Route::group(['prefix' => '/about'], function () {
        Route::get('/', [AboutController::class, 'index']);
        Route::get('/data', [AboutController::class, 'data']);
        Route::post('/create', [AboutController::class, 'store']);
        Route::post('/update', [AboutController::class, 'update']);
        Route::post('/delete', [AboutController::class, 'destroy']);
    });

    Route::group(['prefix' => '/education'], function () {
        Route::get('/', [EducationController::class, 'index']);
        Route::get('/data', [EducationController::class, 'data']);
        Route::post('/create', [EducationController::class, 'store']);
        Route::post('/update', [EducationController::class, 'update']);
        Route::post('/delete', [EducationController::class, 'destroy']);
    });

    Route::group(['prefix' => '/project'], function () {
        Route::get('/', [ProjectController::class, 'index']);
        Route::get('/data', [ProjectController::class, 'data']);
        Route::post('/create', [ProjectController::class, 'store']);
        Route::post('/update', [ProjectController::class, 'update']);
        Route::post('/delete', [ProjectController::class, 'destroy']);
    });

    Route::group(['prefix' => '/tai-khoan'], function () {
        Route::get('/', [AccountController::class, 'index']);
        Route::get('/data', [AccountController::class, 'data']);
        Route::post('/create', [AccountController::class, 'store']);
        Route::post('/delete', [AccountController::class, 'destroy']);
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => []], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
