<?php

use App\Http\Controllers\PersonalColorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PersonalColorController::class, 'welcome'])->name('home');

<<<<<<< HEAD
Route::get('/personalcolor/basic/skin-tone', [PersonalColorController::class, 'skinTone'])
    ->name('personalcolor.basic.skin-tone');
 
Route::post('/personalcolor/basic/skin-tone', [PersonalColorController::class, 'storeSkinTone'])
    ->name('personalcolor.basic.store-skin-tone');
=======
Route::prefix('personal-color')->name('personal-color.')->group(function () {

    Route::get('/start', [PersonalColorController::class, 'start'])->name('start');
>>>>>>> dcd75b59dda7529bcc714d2dfbdecb333c04ef1f

    Route::get('/skin-tone', [PersonalColorController::class, 'skinTone'])->name('skin-tone');
    Route::post('/skin-tone', [PersonalColorController::class, 'submitSkinTone'])->name('skin-tone.submit');

    Route::get('/undertone', [PersonalColorController::class, 'undertone'])->name('undertone');
    Route::post('/undertone', [PersonalColorController::class, 'submitUndertone'])->name('undertone.submit');

    Route::get('/result', [PersonalColorController::class, 'result'])->name('result');

    Route::get('/complete', [PersonalColorController::class, 'complete'])->name('complete');
});
