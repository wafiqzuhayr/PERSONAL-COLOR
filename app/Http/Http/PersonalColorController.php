<?php

namespace App\Http\Controllers;

use App\Models\PersonalColorResult;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonalColorController extends Controller
{
    /**
     * Halaman utama Personal Color
     */
    public function home()
    {
        return view('personalcolor.home');
    }

    /**
     * Halaman awal Personal Color (Basic)
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
        ], [
            'skin_tone.required' => 'Mohon pilih tone kulit Anda',
            'skin_tone.in' => 'Pilihan tone kulit tidak valid',
        ]);

        // Simpan ke session
        session(['skin_tone' => $validated['skin_tone']]);

        return redirect()->route('personalcolor.basic.questions')
                       ->with('success', 'Tone kulit berhasil disimpan');
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
        ], [
            'hair_color.required' => 'Mohon pilih warna rambut Anda',
            'eye_color.required' => 'Mohon pilih warna mata Anda',
            'skin_brightness.required' => 'Mohon pilih kecerahan kulit Anda',
            'contrast_level.required' => 'Mohon pilih level kontras Anda',
            'saturation.required' => 'Mohon pilih tingkat saturasi Anda',
        ]);

        // Simpan semua data ke session
        foreach ($validated as $key => $value) {
            session([$key => $value]);
        }

        // Analisis dan hitung hasil
        $analysisResult = $this->analyzePersonalColor($validated);

        return redirect()->route('personalcolor.basic.result')
                       ->with('analysis', $analysisResult)
                       ->with('success', 'Analisis berhasil dilakukan');
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
        $analysis = session('analysis', []);

        return view('personalcolor.basic.result', [
            'skinTone' => $skinTone,
            'hairColor' => $hairColor,
            'eyeColor' => $eyeColor,
            'skinBrightness' => $skinBrightness,
            'contrastLevel' => $contrastLevel,
            'saturation' => $saturation,
            'notes' => $notes,
            'analysis' => $analysis,
        ]);
    }

    /**
     * Simpan hasil ke database
     */
    public function saveResult(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:personal_color_results,email',
            'phone' => 'nullable|string|max:20',
            'accept_marketing' => 'boolean',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
        ]);

        try {
            // Ambil data dari session
            $validated['skin_tone'] = session('skin_tone');
            $validated['hair_color'] = session('hair_color');
            $validated['eye_color'] = session('eye_color');
            $validated['skin_brightness'] = session('skin_brightness');
            $validated['contrast_level'] = session('contrast_level');
            $validated['saturation'] = session('saturation');
            $validated['notes'] = session('notes');
            $validated['color_type'] = $this->determineColorType(
                session('skin_brightness'),
                session('contrast_level'),
                session('saturation')
            );

            // Handle photo upload
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $path = $file->store('personal-colors', 'public');
                $validated['photo_path'] = $path;
            }

            // Simpan ke database
            PersonalColorResult::create($validated);

            // Clear session
            session()->forget([
                'skin_tone',
                'hair_color',
                'eye_color',
                'skin_brightness',
                'contrast_level',
                'saturation',
                'notes',
                'analysis',
            ]);

            return redirect()->route('personalcolor.home')
                           ->with('success', 'Hasil analisis berhasil disimpan! Terima kasih telah menggunakan layanan kami.');
        } catch (\Exception $e) {
            return back()
                   ->with('error', 'Terjadi kesalahan saat menyimpan data. Silahkan coba lagi.')
                   ->withInput();
        }
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

        // Tentukan deskripsi
        $description = $this->getColorDescription($seasonalColor);

        return [
            'seasonal_color' => $seasonalColor,
            'recommended_colors' => $recommendedColors,
            'metal' => $metal,
            'brightness' => $brightness,
            'contrast' => $contrast,
            'saturation' => $saturation,
            'description' => $description,
        ];
    }

    /**
     * Tentukan seasonal color (Spring, Summer, Autumn, Winter)
     */
    private function determineSeasonalColor($brightness, $contrast, $saturation)
    {
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
     * Tentukan tipe warna untuk database
     */
    private function determineColorType($brightness, $contrast, $saturation)
    {
        return $this->determineSeasonalColor($brightness, $contrast, $saturation);
    }

    /**
     * Dapatkan deskripsi untuk seasonal color
     */
    private function getColorDescription($seasonalColor)
    {
        $descriptions = [
            'spring' => 'Anda memiliki warna musim semi yang cerah dan hangat. Warna-warna yang cocok adalah yang memiliki energi tinggi dan kehangatan golden.',
            'summer' => 'Anda memiliki warna musim panas yang lembut dan sejuk. Warna-warna pastel dan tone dingin akan membuat Anda bersinar.',
            'autumn' => 'Anda memiliki warna musim gugur yang kaya dan hangat. Warna-warna earth tone dan kehangatan akan menjadi pilihan terbaik.',
            'winter' => 'Anda memiliki warna musim dingin yang tajam dan dingin. Warna-warna tegas dan kontras tinggi akan menonjolkan keindahan Anda.',
        ];

        return $descriptions[$seasonalColor] ?? '';
    }

    /**
     * Dapatkan recommended colors berdasarkan analysis
     */
    private function getRecommendedColors($skinTone, $seasonalColor, $saturation)
    {
        $colors = [];

        if ($skinTone === 'warm') {
            $colors = [
                'primary' => ['#FFA500', '#FFD700', '#FF8C00', '#CD853F', '#FF6347', '#8B4513'],
                'secondary' => ['#DC143C', '#FF4500', '#DAA520', '#ADFF2F', '#FF7F50'],
            ];
        } elseif ($skinTone === 'cool') {
            $colors = [
                'primary' => ['#4169E1', '#9370DB', '#FF69B4', '#00CED1', '#8B008B', '#FF1493'],
                'secondary' => ['#DC143C', '#00BFFF', '#F0F8FF', '#BA55D3', '#48D1CC'],
            ];
        } else {
            // neutral
            $colors = [
                'primary' => ['#20B2AA', '#9932CC', '#696969', '#708090', '#FF1493', '#4169E1'],
                'secondary' => ['#00CED1', '#A9A9A9', '#F5F5F5', '#DAA520', '#DC143C'],
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
            'warm' => 'Gold',
            'cool' => 'Silver',
            'neutral' => 'Keduanya cocok',
            default => 'Gold',
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
            'analysis',
        ]);

        return redirect()->route('personalcolor.home')
                       ->with('success', 'Data telah direset');
    }

    /**
     * Get color results - untuk halaman admin/dashboard
     */
    public function getAllResults()
    {
        $results = PersonalColorResult::orderBy('created_at', 'desc')->paginate(15);
        return view('personalcolor.admin.results', compact('results'));
    }

    /**
     * Show single result - untuk halaman admin/dashboard
     */
    public function showResult($id)
    {
        $result = PersonalColorResult::findOrFail($id);
        return view('personalcolor.admin.show', compact('result'));
    }

    /**
     * Delete result - untuk halaman admin/dashboard
     */
    public function deleteResult($id)
    {
        try {
            $result = PersonalColorResult::findOrFail($id);
            
            // Delete file jika ada
            if ($result->photo_path) {
                Storage::disk('public')->delete($result->photo_path);
            }
            
            $result->delete();
            
            return redirect()->route('personalcolor.results')
                           ->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus data');
        }
    }
}