<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Tone Kulit - Personal Color</title>
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
                    <h2 class="text-2xl font-bold text-gray-900">Langkah 1: Tone Kulit Anda</h2>
                    <span class="text-sm font-semibold text-purple-600">1 dari 3</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-gradient-to-r from-purple-600 to-pink-600 h-2 rounded-full" style="width: 33%"></div>
                </div>
            </div>

            <!-- Content -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Apa tone kulit Anda?</h3>
                <p class="text-gray-600 mb-8">Pilih salah satu yang paling sesuai dengan karakteristik kulit Anda</p>

                <form id="skinToneForm" method="POST" action="{{ route('personalcolor.basic.store-skin-tone') }}">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <!-- Warm Skin Tone -->
                        <label class="cursor-pointer group">
                            <div class="relative overflow-hidden rounded-lg border-2 border-gray-200 p-6 hover:border-purple-500 transition duration-300 group-hover:shadow-lg">
                                <input type="radio" name="skin_tone" value="warm" class="hidden peer" required>
                                <div class="flex items-start mb-4">
                                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-amber-300 to-orange-400 mr-4"></div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900">Warm</h4>
                                        <p class="text-sm text-gray-600">Golden/Kuning</p>
                                    </div>
                                </div>
                                <ul class="text-sm text-gray-600 space-y-2">
                                    <li>✓ Vena terlihat hijau/olive</li>
                                    <li>✓ Emas cocok lebih dari perak</li>
                                    <li>✓ Kekuningan di area tertentu</li>
                                    <li>✓ Spots berwarna cokelat</li>
                                </ul>
                                <div class="absolute top-0 right-0 w-6 h-6 bg-purple-600 rounded-bl-lg hidden peer-checked:flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- Cool Skin Tone -->
                        <label class="cursor-pointer group">
                            <div class="relative overflow-hidden rounded-lg border-2 border-gray-200 p-6 hover:border-purple-500 transition duration-300 group-hover:shadow-lg">
                                <input type="radio" name="skin_tone" value="cool" class="hidden peer" required>
                                <div class="flex items-start mb-4">
                                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-300 to-pink-300 mr-4"></div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900">Cool</h4>
                                        <p class="text-sm text-gray-600">Pink/Merah</p>
                                    </div>
                                </div>
                                <ul class="text-sm text-gray-600 space-y-2">
                                    <li>✓ Vena terlihat biru/ungu</li>
                                    <li>✓ Perak cocok lebih dari emas</li>
                                    <li>✓ Kemerahan/keunguan</li>
                                    <li>✓ Spots berwarna abu-abu</li>
                                </ul>
                                <div class="absolute top-0 right-0 w-6 h-6 bg-purple-600 rounded-bl-lg hidden peer-checked:flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </label>

                        <!-- Neutral Skin Tone -->
                        <label class="cursor-pointer group md:col-span-2">
                            <div class="relative overflow-hidden rounded-lg border-2 border-gray-200 p-6 hover:border-purple-500 transition duration-300 group-hover:shadow-lg">
                                <input type="radio" name="skin_tone" value="neutral" class="hidden peer" required>
                                <div class="flex items-start mb-4">
                                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-amber-200 to-pink-200 mr-4"></div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900">Neutral (Balanced)</h4>
                                        <p class="text-sm text-gray-600">Kombinasi keduanya</p>
                                    </div>
                                </div>
                                <ul class="text-sm text-gray-600 space-y-2">
                                    <li>✓ Vena terlihat sama antara hijau dan biru</li>
                                    <li>✓ Emas dan perak sama cocoknya</li>
                                    <li>✓ Kombinasi karakteristik warm dan cool</li>
                                </ul>
                                <div class="absolute top-0 right-0 w-6 h-6 bg-purple-600 rounded-bl-lg hidden peer-checked:flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-between">
                        <a href="{{ route('personalcolor.basic.start') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-900 font-bold py-3 px-6 rounded-lg transition duration-300">
                            ← Kembali
                        </a>
                        <button type="submit" class="bg-gradient-to-r from-purple-600 to-pink-600 hover:shadow-lg text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                            Lanjutkan →
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('skinToneForm').addEventListener('submit', function(e) {
            const selected = document.querySelector('input[name="skin_tone"]:checked');
            if (!selected) {
                e.preventDefault();
                alert('Mohon pilih tone kulit Anda terlebih dahulu');
            }
        });
    </script>
</body>
</html>