<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertanyaan Detail - Personal Color</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-pink-50 p-4">
        <div class="max-w-4xl mx-auto">
            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-2xl font-bold text-gray-900">Langkah 2: Detail Kulit Anda</h2>
                    <span class="text-sm font-semibold text-purple-600">2 dari 3</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 h-2 rounded-full" style="width: 66%"></div>
                </div>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Jawab beberapa pertanyaan untuk analisis yang lebih akurat</h3>
                <p class="text-gray-600 mb-8">Informasi ini akan membantu kami memberikan rekomendasi warna terbaik untuk Anda</p>

                <form id="questionsForm" method="POST" action="{{ route('personalcolor.basic.store-questions') }}">
                    @csrf
                    <input type="hidden" name="skin_tone" value="{{ session('skin_tone', 'warm') }}">

                    <!-- Question 1: Hair Color -->
                    <div class="mb-8 pb-8 border-b">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">1. Warna Rambut Anda?</h4>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <label class="cursor-pointer group">
                                <input type="radio" name="hair_color" value="black" class="hidden peer" required>
                                <div class="bg-gray-100 rounded-lg p-4 text-center hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600 peer-checked:bg-purple-50">
                                    <div class="w-12 h-12 rounded-full bg-black mx-auto mb-2"></div>
                                    <p class="text-sm font-medium text-gray-900">Hitam</p>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="hair_color" value="dark_brown" class="hidden peer" required>
                                <div class="bg-gray-100 rounded-lg p-4 text-center hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600 peer-checked:bg-purple-50">
                                    <div class="w-12 h-12 rounded-full bg-amber-900 mx-auto mb-2"></div>
                                    <p class="text-sm font-medium text-gray-900">Cokelat Gelap</p>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="hair_color" value="light_brown" class="hidden peer" required>
                                <div class="bg-gray-100 rounded-lg p-4 text-center hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600 peer-checked:bg-purple-50">
                                    <div class="w-12 h-12 rounded-full bg-amber-600 mx-auto mb-2"></div>
                                    <p class="text-sm font-medium text-gray-900">Cokelat Terang</p>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="hair_color" value="blonde" class="hidden peer" required>
                                <div class="bg-gray-100 rounded-lg p-4 text-center hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600 peer-checked:bg-purple-50">
                                    <div class="w-12 h-12 rounded-full bg-yellow-400 mx-auto mb-2"></div>
                                    <p class="text-sm font-medium text-gray-900">Pirang</p>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="hair_color" value="red" class="hidden peer" required>
                                <div class="bg-gray-100 rounded-lg p-4 text-center hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600 peer-checked:bg-purple-50">
                                    <div class="w-12 h-12 rounded-full bg-red-600 mx-auto mb-2"></div>
                                    <p class="text-sm font-medium text-gray-900">Merah</p>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="hair_color" value="gray" class="hidden peer" required>
                                <div class="bg-gray-100 rounded-lg p-4 text-center hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600 peer-checked:bg-purple-50">
                                    <div class="w-12 h-12 rounded-full bg-gray-400 mx-auto mb-2"></div>
                                    <p class="text-sm font-medium text-gray-900">Abu-abu</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Question 2: Eye Color -->
                    <div class="mb-8 pb-8 border-b">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">2. Warna Mata Anda?</h4>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                            <label class="cursor-pointer group">
                                <input type="radio" name="eye_color" value="dark_brown" class="hidden peer" required>
                                <div class="bg-gray-100 rounded-lg p-4 text-center hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600 peer-checked:bg-purple-50">
                                    <div class="w-12 h-12 rounded-full bg-amber-900 mx-auto mb-2 border-4 border-gray-300"></div>
                                    <p class="text-sm font-medium text-gray-900">Cokelat Tua</p>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="eye_color" value="brown" class="hidden peer" required>
                                <div class="bg-gray-100 rounded-lg p-4 text-center hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600 peer-checked:bg-purple-50">
                                    <div class="w-12 h-12 rounded-full bg-amber-700 mx-auto mb-2 border-4 border-gray-300"></div>
                                    <p class="text-sm font-medium text-gray-900">Cokelat</p>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="eye_color" value="hazel" class="hidden peer" required>
                                <div class="bg-gray-100 rounded-lg p-4 text-center hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600 peer-checked:bg-purple-50">
                                    <div class="w-12 h-12 rounded-full bg-yellow-700 mx-auto mb-2 border-4 border-gray-300"></div>
                                    <p class="text-sm font-medium text-gray-900">Hazel</p>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="eye_color" value="green" class="hidden peer" required>
                                <div class="bg-gray-100 rounded-lg p-4 text-center hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600 peer-checked:bg-purple-50">
                                    <div class="w-12 h-12 rounded-full bg-green-500 mx-auto mb-2 border-4 border-gray-300"></div>
                                    <p class="text-sm font-medium text-gray-900">Hijau</p>
                                </div>
                            </label>
                            <label class="cursor-pointer group">
                                <input type="radio" name="eye_color" value="blue" class="hidden peer" required>
                                <div class="bg-gray-100 rounded-lg p-4 text-center hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600 peer-checked:bg-purple-50">
                                    <div class="w-12 h-12 rounded-full bg-blue-500 mx-auto mb-2 border-4 border-gray-300"></div>
                                    <p class="text-sm font-medium text-gray-900">Biru</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Question 3: Skin Brightness -->
                    <div class="mb-8 pb-8 border-b">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">3. Tingkat Kecerahan Kulit Anda?</h4>
                        <div class="space-y-3">
                            <label class="cursor-pointer block">
                                <div class="flex items-center p-4 bg-gray-100 rounded-lg hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600">
                                    <input type="radio" name="skin_brightness" value="very_fair" class="w-4 h-4 text-purple-600 mr-4" required>
                                    <div class="flex-1">
                                        <p class="font-medium text-gray-900">Sangat Putih / Fair</p>
                                        <p class="text-sm text-gray-600">Kulit yang sangat terang, mudah terbakar sinar matahari</p>
                                    </div>
                                    <div class="w-16 h-12 rounded ml-4" style="background-color: #FFF5E1; border: 1px solid #ccc;"></div>
                                </div>
                            </label>
                            <label class="cursor-pointer block">
                                <div class="flex items-center p-4 bg-gray-100 rounded-lg hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600">
                                    <input type="radio" name="skin_brightness" value="fair" class="w-4 h-4 text-purple-600 mr-4" required>
                                    <div class="flex-1">
                                        <p class="font-medium text-gray-900">Putih / Fair</p>
                                        <p class="text-sm text-gray-600">Kulit terang dengan sedikit warna</p>
                                    </div>
                                    <div class="w-16 h-12 rounded ml-4" style="background-color: #FFE4B5; border: 1px solid #ccc;"></div>
                                </div>
                            </label>
                            <label class="cursor-pointer block">
                                <div class="flex items-center p-4 bg-gray-100 rounded-lg hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600">
                                    <input type="radio" name="skin_brightness" value="medium" class="w-4 h-4 text-purple-600 mr-4" required>
                                    <div class="flex-1">
                                        <p class="font-medium text-gray-900">Sedang / Medium</p>
                                        <p class="text-sm text-gray-600">Kulit dengan tingkat kecerahan sedang</p>
                                    </div>
                                    <div class="w-16 h-12 rounded ml-4" style="background-color: #D2B48C; border: 1px solid #ccc;"></div>
                                </div>
                            </label>
                            <label class="cursor-pointer block">
                                <div class="flex items-center p-4 bg-gray-100 rounded-lg hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600">
                                    <input type="radio" name="skin_brightness" value="tan" class="w-4 h-4 text-purple-600 mr-4" required>
                                    <div class="flex-1">
                                        <p class="font-medium text-gray-900">Tan / Cokelat</p>
                                        <p class="text-sm text-gray-600">Kulit yang lebih gelap dari medium</p>
                                    </div>
                                    <div class="w-16 h-12 rounded ml-4" style="background-color: #BC8F8F; border: 1px solid #ccc;"></div>
                                </div>
                            </label>
                            <label class="cursor-pointer block">
                                <div class="flex items-center p-4 bg-gray-100 rounded-lg hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600">
                                    <input type="radio" name="skin_brightness" value="deep" class="w-4 h-4 text-purple-600 mr-4" required>
                                    <div class="flex-1">
                                        <p class="font-medium text-gray-900">Gelap / Deep</p>
                                        <p class="text-sm text-gray-600">Kulit yang sangat gelap dengan cokelat kaya</p>
                                    </div>
                                    <div class="w-16 h-12 rounded ml-4" style="background-color: #8B4513; border: 1px solid #ccc;"></div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Question 4: Contrast Level -->
                    <div class="mb-8 pb-8 border-b">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">4. Kontras Antara Kulit, Rambut, dan Mata?</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <label class="cursor-pointer">
                                <div class="bg-gray-100 rounded-lg p-6 text-center hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600">
                                    <input type="radio" name="contrast_level" value="high" class="hidden peer" required>
                                    <p class="text-2xl mb-2">⚫⚪</p>
                                    <p class="font-medium text-gray-900">Tinggi</p>
                                    <p class="text-sm text-gray-600 mt-2">Perbedaan yang jelas antara rambut, kulit, dan mata</p>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <div class="bg-gray-100 rounded-lg p-6 text-center hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600">
                                    <input type="radio" name="contrast_level" value="medium" class="hidden peer" required>
                                    <p class="text-2xl mb-2">⚫🔘</p>
                                    <p class="font-medium text-gray-900">Sedang</p>
                                    <p class="text-sm text-gray-600 mt-2">Perbedaan yang cukup terlihat</p>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <div class="bg-gray-100 rounded-lg p-6 text-center hover:shadow-md transition peer-checked:ring-2 peer-checked:ring-purple-600">
                                    <input type="radio" name="contrast_level" value="low" class="hidden peer" required>
                                    <p class="text-2xl mb-2">🟤🟤</p>
                                    <p class="font-medium text-gray-900">Rendah</p>
                                    <p class="text-sm text-gray-600 mt-2">Warna-warna yang serupa atau sama</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Question 5: Skin Saturation -->
                    <div class="mb-8 pb-8 border-b">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">5. Tingkat Saturasi Kulit Anda?</h4>
                        <div class="space-y-3">
                            <label class="cursor-pointer block">
                                <div class="flex items-center p-4 bg-gray-100 rounded-lg hover:shadow-md transition">
                                    <input type="radio" name="saturation" value="muted" class="w-4 h-4 text-purple-600 mr-4" required>
                                    <div class="flex-1">
                                        <p class="font-medium text-gray-900">Muted (Lembut)</p>
                                        <p class="text-sm text-gray-600">Warna-warna kulit yang lembut dan soft</p>
                                    </div>
                                </div>
                            </label>
                            <label class="cursor-pointer block">
                                <div class="flex items-center p-4 bg-gray-100 rounded-lg hover:shadow-md transition">
                                    <input type="radio" name="saturation" value="medium" class="w-4 h-4 text-purple-600 mr-4" required>
                                    <div class="flex-1">
                                        <p class="font-medium text-gray-900">Medium (Sedang)</p>
                                        <p class="text-sm text-gray-600">Warna-warna kulit yang moderat</p>
                                    </div>
                                </div>
                            </label>
                            <label class="cursor-pointer block">
                                <div class="flex items-center p-4 bg-gray-100 rounded-lg hover:shadow-md transition">
                                    <input type="radio" name="saturation" value="vibrant" class="w-4 h-4 text-purple-600 mr-4" required>
                                    <div class="flex-1">
                                        <p class="font-medium text-gray-900">Vibrant (Cerah)</p>
                                        <p class="text-sm text-gray-600">Warna-warna kulit yang kaya dan cerah</p>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Additional Notes -->
                    <div class="mb-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">6. Catatan Tambahan (Opsional)</h4>
                        <textarea name="notes" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="Tambahkan informasi tambahan yang menurut Anda penting..."></textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-between">
                        <a href="{{ route('personalcolor.basic.skin-tone') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-900 font-bold py-3 px-6 rounded-lg transition duration-300">
                            ← Kembali
                        </a>
                        <button type="submit" class="bg-gradient-to-r from-purple-600 to-pink-600 hover:shadow-lg text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                            Lihat Hasil →
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('questionsForm').addEventListener('submit', function(e) {
            const requiredFields = ['hair_color', 'eye_color', 'skin_brightness', 'contrast_level', 'saturation'];
            let allFilled = true;

            requiredFields.forEach(field => {
                const selected = document.querySelector(`input[name="${field}"]:checked`);
                if (!selected) {
                    allFilled = false;
                }
            });

            if (!allFilled) {
                e.preventDefault();
                alert('Mohon jawab semua pertanyaan sebelum melanjutkan');
            }
        });
    </script>
</body>
</html>