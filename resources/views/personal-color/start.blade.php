<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mulai Analisis - Personal Color</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-pink-50 flex items-center justify-center p-4">
        <div class="max-w-2xl w-full">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-5xl font-bold text-gray-900 mb-4">Personal Color</h1>
                <p class="text-xl text-gray-600 mb-8">Temukan palet warna yang paling cocok untuk Anda</p>
                <div class="flex justify-center gap-8 mb-12">
                    <div class="text-center">
                        <div class="w-20 h-20 rounded-full bg-amber-200 mx-auto mb-2"></div>
                        <p class="text-sm text-gray-600">Warm</p>
                    </div>
                    <div class="text-center">
                        <div class="w-20 h-20 rounded-full bg-blue-200 mx-auto mb-2"></div>
                        <p class="text-sm text-gray-600">Cool</p>
                    </div>
                </div>
            </div>

            <!-- Info Cards -->
            <div class="grid md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="text-3xl mb-4">🎨</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Analisis Warna</h3>
                    <p class="text-gray-600 text-sm">Dapatkan rekomendasi warna berdasarkan tone kulit Anda</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="text-3xl mb-4">✨</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Personal Style</h3>
                    <p class="text-gray-600 text-sm">Temukan gaya yang paling menonjolkan keindahan Anda</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="text-3xl mb-4">💄</div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Fashion Guide</h3>
                    <p class="text-gray-600 text-sm">Panduan lengkap untuk pemilihan warna pakaian</p>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="text-center mb-12">
                <a href="{{ route('personalcolor.basic.skin-tone') }}" class="inline-block bg-gradient-to-r from-purple-600 to-pink-600 text-white font-bold py-4 px-8 rounded-lg hover:shadow-lg transform hover:scale-105 transition duration-300">
                    Mulai Analisis Sekarang
                </a>
                <p class="text-gray-600 text-sm mt-4">Proses ini membutuhkan waktu sekitar 2 menit</p>
            </div>

            <!-- Footer Info -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="font-semibold text-gray-900 mb-4">Bagaimana cara kerjanya?</h3>
                <ol class="space-y-3 text-gray-600 text-sm">
                    <li><span class="font-semibold text-purple-600">1.</span> Tentukan tone kulit Anda</li>
                    <li><span class="font-semibold text-purple-600">2.</span> Jawab pertanyaan tentang karakteristik kulit</li>
                    <li><span class="font-semibold text-purple-600">3.</span> Dapatkan hasil analisis lengkap dengan rekomendasi warna</li>
                </ol>
            </div>
        </div>
    </div>
</body>
</html>