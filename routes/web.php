<?php

use App\Http\Controllers\PersonalColorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PersonalColorController::class, 'welcome'])->name('welcome');

Route::prefix('personal-color')->name('personal-color.')->group(function () {
    
    // Basic Flow Routes
    Route::prefix('basic')->name('basic.')->group(function () {
        Route::get('/start', [PersonalColorController::class, 'basicStart'])->name('start');
        Route::post('/upload-photo', [PersonalColorController::class, 'uploadPhoto'])->name('upload-photo');
        Route::get('/skin-tone', [PersonalColorController::class, 'skinTone'])->name('skin-tone');
        Route::post('/skin-tone', [PersonalColorController::class, 'submitSkinTone'])->name('skin-tone.submit');
        Route::get('/undertone/{step}', [PersonalColorController::class, 'undertone'])->name('undertone');
        Route::post('/undertone', [PersonalColorController::class, 'submitUndertone'])->name('undertone.submit');
        Route::get('/result', [PersonalColorController::class, 'result'])->name('result');
        Route::post('/save-result', [PersonalColorController::class, 'saveResult'])->name('save-result');
    });
    
    // Expert Flow Routes (untuk development selanjutnya)
    Route::prefix('expert')->name('expert.')->group(function () {
        Route::get('/start', [PersonalColorController::class, 'expertStart'])->name('start');
        // ... tambahkan route expert lainnya
    });
});