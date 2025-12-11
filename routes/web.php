<?php

use App\Http\Controllers\PersonalColorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PersonalColorController::class, 'welcome'])->name('home');

Route::prefix('personal-color')->name('personal-color.')->group(function () {

    Route::get('/start', [PersonalColorController::class, 'start'])->name('start');

    Route::get('/skin-tone', [PersonalColorController::class, 'skinTone'])->name('skin-tone');
    Route::post('/skin-tone', [PersonalColorController::class, 'submitSkinTone'])->name('skin-tone.submit');

    Route::get('/undertone', [PersonalColorController::class, 'undertone'])->name('undertone');
    Route::post('/undertone', [PersonalColorController::class, 'submitUndertone'])->name('undertone.submit');

    Route::get('/result', [PersonalColorController::class, 'result'])->name('result');

    Route::get('/complete', [PersonalColorController::class, 'complete'])->name('complete');
});
