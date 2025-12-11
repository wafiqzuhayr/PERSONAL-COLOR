<?php
// routes/web.php

use App\Http\Controllers\PersonalColorController;
use Illuminate\Support\Facades\Route;

// Route Personal Color
Route::get('/personalcolor/basic/start', [PersonalColorController::class, 'basicStart'])
    ->name('personalcolor.basic.start');

Route::get('/personalcolor/basic/skin-tone', [PersonalColorController::class, 'skinTone'])
    ->name('personalcolor.basic.skin-tone');
 
Route::post('/personalcolor/basic/skin-tone', [PersonalColorController::class, 'storeSkinTone'])
    ->name('personalcolor.basic.store-skin-tone');

Route::get('/personalcolor/basic/questions', [PersonalColorController::class, 'questions'])
    ->name('personalcolor.basic.questions');

Route::post('/personalcolor/basic/questions', [PersonalColorController::class, 'storeQuestions'])
    ->name('personalcolor.basic.store-questions');

Route::get('/personalcolor/basic/result', [PersonalColorController::class, 'result'])
    ->name('personalcolor.basic.result'); 

Route::post('/personalcolor/basic/reset', [PersonalColorController::class, 'resetSession'])
    ->name('personalcolor.basic.reset');
   