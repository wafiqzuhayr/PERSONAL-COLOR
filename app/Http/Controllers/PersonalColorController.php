<?php

namespace App\Http\Controllers;

<<<<<<< HEAD:app/Http/Http/PersonalColorController.php
use Illuminate\Foundation\Http\Controller as BaseController;
=======
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
>>>>>>> 63f6901b044bc60a39697bae2ae098d0e9cacb56:app/Http/Controllers/PersonalColorController.php

class Controller extends BaseController
{
    /**
     * Halaman utama Personal Color
     */
    public function home()
    {
        return view('personal-color.home');
    }

    /**
     * Halaman welcome
     */
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * Halaman start (awal analisis)
     */
    public function basicStart()
    {
        session()->forget(['skin_tone', 'undertone', 'questions']);
        return view('personal-color.basic-start');
    }

    public function start()
    {
        session()->forget(['skin_tone', 'undertone', 'questions']);
        return view('personal-color.start');
    }

    /**
     * Halaman pilih skin tone
     */
    public function skinTone()
    {
        return view('personal-color.skin-tone');
    }

    /**
     * Simpan skin tone ke session
     */
    public function storeSkinTone(Request $request)
    {
        $validated = $request->validate([
            'skin_tone' => 'required|in:fair,light,medium,tan,deep,dark'
        ]);

        session(['skin_tone' => $validated['skin_tone']]);
        return redirect()->route('personalcolor.basic.questions');
    }

    public function submitSkinTone(Request $request)
    {
        $validated = $request->validate([
            'skin_tone' => 'required|in:fair,light,medium,tan,deep,dark'
        ]);

        session(['skin_tone' => $validated['skin_tone']]);
        return redirect()->route('personal-color.undertone');
    }

    /**
     * Halaman pertanyaan tambahan
     */
    public function questions()
    {
        return view('personal-color.questions');
    }

    /**
     * Simpan jawaban pertanyaan
     */
    public function storeQuestions(Request $request)
    {
        $validated = $request->validate([
            'hair_color' => 'required|string',
            'eye_color' => 'required|string',
            'vein_color' => 'required|in:blue,green,red',
            'metal_preference' => 'required|in:gold,silver,both'
        ]);

        session(['questions' => $validated]);
        return redirect()->route('personalcolor.basic.result');
    }

    /**
     * Halaman pilih undertone
     */
    public function undertone()
    {
        return view('personal-color.undertone');
    }

    /**
     * Simpan undertone ke session
     */
    public function submitUndertone(Request $request)
    {
        $validated = $request->validate([
            'undertone' => 'required|in:cool,warm,neutral'
        ]);

        session(['undertone' => $validated['undertone']]);
        return redirect()->route('personal-color.result');
    }

    /**
     * Halaman hasil analisis
     */
    public function result()
    {
        $skinTone = session('skin_tone');
        $undertone = session('undertone');
        $questions = session('questions', []);

        if (!$skinTone || !$undertone) {
            return redirect()->route('personal-color.start');
        }

        $colorType = $this->determineColorType($skinTone, $undertone);

        return view('personal-color.result', [
            'colorType' => $colorType,
            'skinTone' => $skinTone,
            'undertone' => $undertone,
            'questions' => $questions
        ]);
    }

    /**
     * Halaman selesai
     */
    public function complete()
    {
        return view('personal-color.complete');
    }

    /**
     * Simpan hasil analisis
     */
    public function saveResult(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ]);

        $result = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'skin_tone' => session('skin_tone'),
            'undertone' => session('undertone'),
            'questions' => session('questions'),
            'color_type' => $this->determineColorType(
                session('skin_tone'),
                session('undertone')
            ),
            'created_at' => now()
        ];

        session(['saved_result' => $result]);
        return redirect()->route('personal-color.complete');
    }

    /**
     * Ambil semua hasil analisis (Admin)
     */
    public function getAllResults()
    {
        $results = [];
        return view('personal-color.results', ['results' => $results]);
    }

    /**
     * Tampilkan satu hasil analisis
     */
    public function showResult($id)
    {
        // $result = PersonColorResult::findOrFail($id);
        // return view('personal-color.show-result', ['result' => $result]);
    }

    /**
     * Hapus hasil analisis
     */
    public function deleteResult($id)
    {
        // PersonColorResult::findOrFail($id)->delete();
        // return redirect()->route('personalcolor.results');
    }

    /**
     * Reset session
     */
    public function resetSession()
    {
        session()->forget(['skin_tone', 'undertone', 'questions', 'saved_result']);
        return redirect()->route('personalcolor.home');
    }

    /**
     * Tentukan tipe warna berdasarkan skin tone dan undertone
     */
    private function determineColorType($skinTone, $undertone)
    {
        $colorTypes = [
            'fair_cool' => 'Summer',
            'fair_warm' => 'Spring',
            'fair_neutral' => 'Soft Summer',
            'light_cool' => 'Summer',
            'light_warm' => 'Spring',
            'light_neutral' => 'Soft Summer',
            'medium_cool' => 'Summer',
            'medium_warm' => 'Autumn',
            'medium_neutral' => 'Soft Autumn',
            'tan_cool' => 'Cool Winter',
            'tan_warm' => 'Warm Autumn',
            'tan_neutral' => 'Soft Autumn',
            'deep_cool' => 'Winter',
            'deep_warm' => 'Deep Autumn',
            'deep_neutral' => 'Deep Winter',
            'dark_cool' => 'Winter',
            'dark_warm' => 'Deep Autumn',
            'dark_neutral' => 'Deep Winter'
        ];

        $key = "{$skinTone}_{$undertone}";
        return $colorTypes[$key] ?? 'Neutral';
    }
}