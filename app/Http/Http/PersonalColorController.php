<?php

namespace App\Http\Controllers;

use App\Models\PersonalColorResult;
use App\Services\ColorAnalysisService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonalColorController extends Controller
{
    protected $colorAnalysis;

    public function __construct(ColorAnalysisService $colorAnalysis)
    {
        $this->colorAnalysis = $colorAnalysis;
    }

    /**
     * Display welcome page
     */
    public function welcome()
    {
        return view('personal-color.welcome');
    }

    /**
     * Display camera page for basic flow
     */
    public function basicStart()
    {
        return view('personal-color.basic.start');
    }

    /**
     * Handle photo upload
     */
    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'privacy_accepted' => 'required|accepted'
        ]);

        $photo = $request->file('photo');
        $path = $photo->store('uploads/photos', 'public');

        session(['user_photo' => $path]);

        return redirect()->route('personal-color.basic.skin-tone');
    }

    /**
     * Display skin tone selection page
     */
    public function skinTone()
    {
        if (!session('user_photo')) {
            return redirect()->route('personal-color.basic.start');
        }

        $skinTones = $this->colorAnalysis->getSkinTones();

        return view('personal-color.basic.skin-tone', [
            'skinTones' => $skinTones,
            'userPhoto' => session('user_photo')
        ]);
    }

    /**
     * Handle skin tone submission
     */
    public function submitSkinTone(Request $request)
    {
        $request->validate([
            'skin_tone' => 'required|string'
        ]);

        session(['skin_tone' => $request->skin_tone]);

        return redirect()->route('personal-color.basic.undertone', ['step' => 1]);
    }

    /**
     * Display undertone selection page
     */
    public function undertone($step)
    {
        if (!session('skin_tone')) {
            return redirect()->route('personal-color.basic.skin-tone');
        }

        $undertoneOptions = $this->colorAnalysis->getUndertoneOptions($step);

        if (!$undertoneOptions) {
            return redirect()->route('personal-color.basic.result');
        }

        return view('personal-color.basic.undertone', [
            'step' => $step,
            'options' => $undertoneOptions,
            'totalSteps' => 3,
            'userPhoto' => session('user_photo')
        ]);
    }

    /**
     * Handle undertone submission
     */
    public function submitUndertone(Request $request)
    {
        $request->validate([
            'undertone' => 'required|string',
            'step' => 'required|integer|min:1|max:3'
        ]);

        $undertones = session('undertones', []);
        $undertones[$request->step] = $request->undertone;
        session(['undertones' => $undertones]);

        $nextStep = $request->step + 1;

        if ($nextStep > 3) {
            return redirect()->route('personal-color.basic.result');
        }

        return redirect()->route('personal-color.basic.undertone', ['step' => $nextStep]);
    }

    /**
     * Display result page
     */
    public function result()
    {
        if (!session('undertones') || count(session('undertones')) < 3) {
            return redirect()->route('personal-color.basic.start');
        }

        $undertones = session('undertones');
        $colorType = $this->colorAnalysis->analyzeColorType($undertones);
        $recommendations = $this->colorAnalysis->getRecommendations($colorType);

        session(['color_type' => $colorType]);

        return view('personal-color.basic.result', [
            'colorType' => $colorType,
            'recommendations' => $recommendations,
            'userPhoto' => session('user_photo')
        ]);
    }

    /**
     * Save result to database
     */
    public function saveResult(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20'
        ]);

        try {
            $result = PersonalColorResult::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'photo_path' => session('user_photo'),
                'skin_tone' => session('skin_tone'),
                'undertones' => json_encode(session('undertones')),
                'color_type' => session('color_type'),
                'accept_marketing' => $request->has('accept_marketing')
            ]);

            // Clear session
            session()->forget(['user_photo', 'skin_tone', 'undertones', 'color_type']);

            return response()->json([
                'success' => true,
                'message' => 'Result saved successfully!',
                'data' => $result
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to save result: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Expert flow start (untuk development selanjutnya)
     */
    public function expertStart()
    {
        return view('personal-color.expert.start');
    }
}