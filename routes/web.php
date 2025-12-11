<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalColorController;

Route::get('/', function () {
    return view('welcome');
});

// Personal Color Home
Route::get('/personalcolor', [PersonalColorController::class, 'home'])->name('personalcolor.home');

// Personal Color Basic
Route::get('/personalcolor/basic/start', [PersonalColorController::class, 'basicStart'])->name('personalcolor.basic.start');

Route::get('/personalcolor/basic/skin-tone', [PersonalColorController::class, 'skinTone'])->name('personalcolor.basic.skin-tone');
Route::post('/personalcolor/basic/skin-tone', [PersonalColorController::class, 'storeSkinTone'])->name('personalcolor.basic.store-skin-tone');

Route::get('/personalcolor/basic/questions', [PersonalColorController::class, 'questions'])->name('personalcolor.basic.questions');
Route::post('/personalcolor/basic/questions', [PersonalColorController::class, 'storeQuestions'])->name('personalcolor.basic.store-questions');

Route::get('/personalcolor/basic/result', [PersonalColorController::class, 'result'])->name('personalcolor.basic.result');
Route::post('/personalcolor/basic/save-result', [PersonalColorController::class, 'saveResult'])->name('personalcolor.basic.save-result');
Route::post('/personalcolor/basic/reset', [PersonalColorController::class, 'resetSession'])->name('personalcolor.basic.reset');

// Admin Routes
Route::get('/personalcolor/results', [PersonalColorController::class, 'getAllResults'])->name('personalcolor.results');
Route::get('/personalcolor/results/{id}', [PersonalColorController::class, 'showResult'])->name('personalcolor.show-result');
Route::delete('/personalcolor/results/{id}', [PersonalColorController::class, 'deleteResult'])->name('personalcolor.delete-result');