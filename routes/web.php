<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalColorController;

// Rute Default - Memastikan halaman utama berjalan
Route::get('/', function () {
    return view('welcome');
})->name('welcome'); 
// Menggunakan rute welcome bawaan Laravel, atau ganti dengan:
// Route::get('/', [PersonalColorController::class, 'welcome'])->name('home');

/*
|--------------------------------------------------------------------------
| Personal Color Routes
|--------------------------------------------------------------------------
| Menggunakan Route::prefix dan Route::name untuk mengelompokkan semua rute Personal Color.
| Semua rute di sini akan memiliki path awal '/personalcolor' dan nama awal 'personalcolor.'
*/
Route::prefix('personalcolor')->name('personalcolor.')->group(function () {

    // 1. Home / Landing Page
    // Contoh: GET /personalcolor -> personalcolor.home
    Route::get('/', [PersonalColorController::class, 'home'])->name('home');

    
    // 2. Rute Dasar (Basic Test)
    Route::prefix('basic')->name('basic.')->group(function () {
        
        // Rute Start / Halaman awal tes
        // Contoh: GET /personalcolor/basic/start -> personalcolor.basic.start
        Route::get('/start', [PersonalColorController::class, 'basicStart'])->name('start');

        // Step 1: Skin Tone (Dulu dipisahkan, sekarang digabung)
        // Contoh: GET /personalcolor/basic/skin-tone -> personalcolor.basic.skin-tone
        Route::get('/skin-tone', [PersonalColorController::class, 'skinTone'])->name('skin-tone');
        // Contoh: POST /personalcolor/basic/skin-tone -> personalcolor.basic.store-skin-tone
        Route::post('/skin-tone', [PersonalColorController::class, 'storeSkinTone'])->name('store-skin-tone');
        
        // Rute Q1 (dari contoh sebelumnya)
        // Gunakan rute store-skin-tone untuk menyimpan, atau jika ini step terpisah, biarkan:
        Route::post('/q1', [PersonalColorController::class, 'basicQ1'])->name('q1');
        

        // Step 2: Pertanyaan Lanjutan
        // Contoh: GET /personalcolor/basic/questions -> personalcolor.basic.questions
        Route::get('/questions', [PersonalColorController::class, 'questions'])->name('questions');
        // Contoh: POST /personalcolor/basic/questions -> personalcolor.basic.store-questions
        Route::post('/questions', [PersonalColorController::class, 'storeQuestions'])->name('store-questions');


        // Hasil Tes
        // Contoh: GET /personalcolor/basic/result -> personalcolor.basic.result
        Route::get('/result', [PersonalColorController::class, 'result'])->name('result');
        // Contoh: POST /personalcolor/basic/save-result -> personalcolor.basic.save-result
        Route::post('/save-result', [PersonalColorController::class, 'saveResult'])->name('save-result');
        // Contoh: POST /personalcolor/basic/reset -> personalcolor.basic.reset
        Route::post('/reset', [PersonalColorController::class, 'resetSession'])->name('reset');
    });

    
    // 3. Rute Admin (Results Management)
    Route::prefix('results')->name('results.')->group(function () {
        // Contoh: GET /personalcolor/results -> personalcolor.results.index
        Route::get('/', [PersonalColorController::class, 'getAllResults'])->name('index');
        // Contoh: GET /personalcolor/results/{id} -> personalcolor.results.show
        Route::get('/{id}', [PersonalColorController::class, 'showResult'])->name('show');
        // Contoh: DELETE /personalcolor/results/{id} -> personalcolor.results.delete
        Route::delete('/{id}', [PersonalColorController::class, 'deleteResult'])->name('delete');
    });

    
    /*
    |--------------------------------------------------------------------------
    | Rute Tambahan/Alternative (Jika diperlukan, pastikan tidak konflik)
    |--------------------------------------------------------------------------
    */
    // Jika Anda ingin rute yang lebih pendek (personalcolor.start)
    Route::get('/start', [PersonalColorController::class, 'start'])->name('start'); 
    
    // Rute undertone (jika ini terpisah dari skin-tone)
    Route::get('/undertone', [PersonalColorController::class, 'undertone'])->name('undertone');
    Route::post('/undertone', [PersonalColorController::class, 'submitUndertone'])->name('undertone.submit');
    
    Route::get('/complete', [PersonalColorController::class, 'complete'])->name('complete');

});