<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ColorAnalysisService;
use App\Models\PersonalColorResult;

class PersonalColorController extends Controller
{
    protected $service;

    public function __construct(ColorAnalysisService $service)
    {
        $this->service = $service;
    }

    public function welcome()
    {
        return view('welcome');
    }

    // --- BASIC FLOW ---

    public function basicStart()
    {
        return view('personalcolor.basic.start');
    }

    public function uploadPhoto(Request $request)
    {
        // proses upload (sementara kosong)
        return redirect()->route('personal-color.basic.skin-tone');
    }

    public function skinTone()
    {
        return view('personalcolor.basic.skin-tone');
    }

    public function submitSkinTone(Request $request)
    {
        session(['skin_tone' => $request->skin_tone]);
        return redirect()->route('personal-color.basic.undertone', ['step' => 1]);
    }

    public function undertone($step)
    {
        return view('personalcolor.basic.undertone', compact('step'));
    }

    public function submitUndertone(Request $request)
    {
        session(['undertone' => $request->undertone]);
        return redirect()->route('personal-color.basic.result');
    }

    public function result()
    {
        $result = $this->service->generateResult(
            session('skin_tone'),
            session('undertone')
        );

        return view('personalcolor.basic.result', compact('result'));
    }

    public function saveResult(Request $request)
    {
        PersonalColorResult::create([
            'skin' => session('skin_tone'),
            'undertone' => session('undertone'),
            'result' => $request->result
        ]);

        return redirect()->route('welcome')->with('success', 'Result saved!');
    }

    
    // --- EXPERT FLOW (Belum dikembangkan) ---
    public function expertStart()
    {
        return view('personalcolor.expert.start');
    }
}
