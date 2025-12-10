<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalColorController extends Controller
{
    /**
     * Halaman awal Personal Color
     */
    public function basicStart()
    {
        return view('personalcolor.basic.start');
    }

    /**
     * Halaman pemilihan tone kulit
     */
    public function skinTone()
    {
        return view('personalcolor.basic.skin-tone');
    }

    /**
     * Halaman pertanyaan detail
     */
    public function questions()
    {
        return view('personalcolor.basic.questions');
    }

    /**
     * Proses form skin tone dan lanjut ke questions
     */
    public function storeSkinTone(Request $request)
    {
        $validated = $request->validate([
            'skin_tone' => 'required|in:warm,cool,neutral',
        ]);

        // Simpan ke session
        session(['skin_tone' => $validated['skin_tone']]);

        return redirect()->route('personalcolor.basic.questions');
    }

    /**
     * Proses form questions dan tampilkan hasil
     */
    public function storeQuestions(Request $request)
    {
        $validated = $request->validate([
            'skin_tone' => 'required|in:warm,cool,neutral',
            'hair_color' => 'required|string',
            'eye_color' => 'required|string',
            'skin_brightness' => 'required|string',
            'contrast_level' => 'required|in:high,medium,low',
            'saturation' => 'required|in:muted,medium,vibrant',
            'notes' => 'nullable|string|max:500',
        ]);

        // Simpan semua data ke session
        session($validated);

        // Analisis dan hitung hasil
        $analysisResult = $this->analyzePersonalColor($validated);

        return redirect()->route('personalcolor.basic.result')
                       ->with('analysis', $analysisResult);
    }

    /**
     * Halaman hasil analisis
     */
    public function result()
    {
        $skinTone = session('skin_tone', 'warm');
        $hairColor = session('hair_color', '');
        $eyeColor = session('eye_color', '');
        $skinBrightness = session('skin_brightness', '');
        $contrastLevel = session('contrast_level', '');
        $saturation = session('saturation', '');
        $notes = session('notes', '');

        return view('personalcolor.basic.result', [
            'skinTone' => $skinTone,
            'hairColor' => $hairColor,
            'eyeColor' => $eyeColor,
            'skinBrightness' => $skinBrightness,
            'contrastLevel' => $contrastLevel,
            'saturation' => $saturation,
            'notes' => $notes,
        ]);
    }

    /**
     * Analisis personal color berdasarkan data yang dikirim
     */
    private function analyzePersonalColor($data)
    {
        $skinTone = $data['skin_tone'];
        $brightness = $data['skin_brightness'];
        $contrast = $data['contrast_level'];
        $saturation = $data['saturation'];

        // Tentukan kategori seasonal color
        $seasonalColor = $this->determineSeasonalColor($brightness, $contrast, $saturation);

        // Tentukan recommended colors
        $recommendedColors = $this->getRecommendedColors($skinTone, $seasonalColor, $saturation);

        // Tentukan metal
        $metal = $this->determineMetal($skinTone);

        return [
            'seasonal_color' => $seasonalColor,
            'recommended_colors' => $recommendedColors,
            'metal' => $metal,
            'brightness' => $brightness,
            'contrast' => $contrast,
            'saturation' => $saturation,
        ];
    }

    /**
     * Tentukan seasonal color (Spring, Summer, Autumn, Winter)
     */
    private function determineSeasonalColor($brightness, $contrast, $saturation)
    {
        // Logika untuk menentukan seasonal color
        if ($brightness === 'very_fair' || $brightness === 'fair') {
            if ($saturation === 'muted') {
                return 'summer';
            } elseif ($saturation === 'vibrant') {
                return 'spring';
            } else {
                return 'summer';
            }
        } elseif ($brightness === 'medium' || $brightness === 'tan') {
            if ($saturation === 'muted') {
                return 'autumn';
            } elseif ($saturation === 'vibrant') {
                return 'spring';
            } else {
                return 'autumn';
            }
        } else {
            // deep
            if ($saturation === 'vibrant') {
                return 'winter';
            } else {
                return 'autumn';
            }
        }
    }

    /**
     * Dapatkan recommended colors berdasarkan analysis
     */
    private function getRecommendedColors($skinTone, $seasonalColor, $saturation)
    {
        $colors = [];

        if ($skinTone === 'warm') {
            $colors = [
                'primary' => ['#FFA500', '#FFD700', '#FF8C00', '#CD853F'],
                'secondary' => ['#DC143C', '#FF6347', '#8B4513', '#ADFF2F'],
            ];
        } elseif ($skinTone === 'cool') {
            $colors = [
                'primary' => ['#4169E1', '#9370DB', '#FF69B4', '#00CED1'],
                'secondary' => ['#8B008B', '#DC143C', '#00BFFF', '#F0F8FF'],
            ];
        } else {
            // neutral
            $colors = [
                'primary' => ['#20B2AA', '#9932CC', '#696969', '#708090'],
                'secondary' => ['#FF1493', '#00CED1', '#A9A9A9', '#F5F5F5'],
            ];
        }

        return $colors;
    }

    /**
     * Tentukan metal yang cocok (gold atau silver)
     */
    private function determineMetal($skinTone)
    {
        return match($skinTone) {
            'warm' => 'gold',
            'cool' => 'silver',
            'neutral' => 'both',
            default => 'gold',
        };
    }

    /**
     * Reset session dan kembali ke awal
     */
    public function resetSession()
    {
        session()->forget([
            'skin_tone',
            'hair_color',
            'eye_color',
            'skin_brightness',
            'contrast_level',
            'saturation',
            'notes',
        ]);

        return redirect()->route('personalcolor.basic.start');
    }
}