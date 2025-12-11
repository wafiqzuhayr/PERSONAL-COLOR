
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Analisis - Personal Color</title>
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
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Hasil Analisis Anda</h1>
                <p class="text-gray-600">Temukan palet warna yang sempurna untuk Anda</p>
            </div>

            <!-- Main Result Card -->
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <!-- Skin Tone Result -->
                <div class="md:col-span-2">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-8 text-white">
                            <h2 class="text-3xl font-bold mb-2">Tone Kulit Anda: <span class="capitalize">{{ $skinTone ?? 'Warm' }}</span></h2>
                            <p class="text-lg opacity-90">Palet warna terbaik untuk Anda</p>
                        </div>
                        
                        <div class="p-8">
                            @if(($skinTone ?? 'warm') === 'warm')
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">🌞 Warm Undertone</h3>
                                <p class="text-gray-700 mb-6">Kulit Anda memiliki undertone kehangatan dengan sentuhan kekuningan atau golden. Warna-warna yang memiliki nilai golden atau warm akan membuat Anda terlihat lebih hidup dan sehat.</p>
                                
                                <div class="grid md:grid-cols-2 gap-6 mb-8">
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-4">Warna yang Cocok:</h4>
                                        <div class="flex flex-wrap gap-3">
                                            <div class="w-12 h-12 rounded-lg bg-yellow-500 border-2 border-gray-300" title="Golden Yellow"></div>
                                            <div class="w-12 h-12 rounded-lg bg-orange-500 border-2 border-gray-300" title="Orange"></div>
                                            <div class="w-12 h-12 rounded-lg bg-amber-700 border-2 border-gray-300" title="Warm Brown"></div>
                                            <div class="w-12 h-12 rounded-lg bg-red-600 border-2 border-gray-300" title="Warm Red"></div>
                                            <div class="w-12 h-12 rounded-lg bg-green-700 border-2 border-gray-300" title="Olive Green"></div>
                                            <div class="w-12 h-12 rounded-lg bg-yellow-700 border-2 border-gray-300" title="Gold"></div>
                                            <div class="w-12 h-12 rounded-lg bg-orange-300 border-2 border-gray-300" title="Peach"></div>
                                            <div class="w-12 h-12 rounded-lg bg-yellow-600 border-2 border-gray-300" title="Mustard"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-4">Hindari Warna:</h4>
                                        <div class="flex flex-wrap gap-3">
                                            <div class="w-12 h-12 rounded-lg bg-blue-400 border-2 border-gray-300 opacity-60" title="Bright Blue"></div>
                                            <div class="w-12 h-12 rounded-lg bg-pink-300 border-2 border-gray-300 opacity-60" title="Cool Pink"></div>
                                            <div class="w-12 h-12 rounded-lg bg-purple-400 border-2 border-gray-300 opacity-60" title="Cool Purple"></div>
                                            <div class="w-12 h-12 rounded-lg bg-blue-600 border-2 border-gray-300 opacity-60" title="Cool Blue"></div>
                                            <div class="w-12 h-12 rounded-lg bg-gray-400 border-2 border-gray-300 opacity-60" title="Cool Gray"></div>
                                            <div class="w-12 h-12 rounded-lg bg-black border-2 border-gray-300 opacity-60" title="Pure Black"></div>
                                            <div class="w-12 h-12 rounded-lg bg-red-300 border-2 border-gray-300 opacity-60" title="Cool Red"></div>
                                            <div class="w-12 h-12 rounded-lg bg-cyan-300 border-2 border-gray-300 opacity-60" title="Cyan"></div>
                                        </div>
                                    </div>
                                </div>
                            @elseif(($skinTone ?? 'warm') === 'cool')
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">❄️ Cool Undertone</h3>
                                <p class="text-gray-700 mb-6">Kulit Anda memiliki undertone kesejukan dengan sentuhan kemerahan atau pinkish. Warna-warna yang memiliki nilai cool atau blue akan membuat Anda terlihat lebih cerah dan bercahaya.</p>
                                
                                <div class="grid md:grid-cols-2 gap-6 mb-8">
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-4">Warna yang Cocok:</h4>
                                        <div class="flex flex-wrap gap-3">
                                            <div class="w-12 h-12 rounded-lg bg-blue-500 border-2 border-gray-300" title="True Blue"></div>
                                            <div class="w-12 h-12 rounded-lg bg-pink-500 border-2 border-gray-300" title="Pink"></div>
                                            <div class="w-12 h-12 rounded-lg bg-purple-500 border-2 border-gray-300" title="Purple"></div>
                                            <div class="w-12 h-12 rounded-lg bg-red-500 border-2 border-gray-300" title="Cool Red"></div>
                                            <div class="w-12 h-12 rounded-lg bg-blue-700 border-2 border-gray-300" title="Navy"></div>
                                            <div class="w-12 h-12 rounded-lg bg-gray-600 border-2 border-gray-300" title="Cool Gray"></div>
                                            <div class="w-12 h-12 rounded-lg bg-white border-2 border-gray-300" title="White"></div>
                                            <div class="w-12 h-12 rounded-lg bg-pink-600 border-2 border-gray-300" title="Magenta"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-4">Hindari Warna:</h4>
                                        <div class="flex flex-wrap gap-3">
                                            <div class="w-12 h-12 rounded-lg bg-yellow-500 border-2 border-gray-300 opacity-60" title="Yellow"></div>
                                            <div class="w-12 h-12 rounded-lg bg-orange-500 border-2 border-gray-300 opacity-60" title="Orange"></div>
                                            <div class="w-12 h-12 rounded-lg bg-amber-700 border-2 border-gray-300 opacity-60" title="Warm Brown"></div>
                                            <div class="w-12 h-12 rounded-lg bg-green-600 border-2 border-gray-300 opacity-60" title="Warm Green"></div>
                                            <div class="w-12 h-12 rounded-lg bg-yellow-700 border-2 border-gray-300 opacity-60" title="Gold"></div>
                                            <div class="w-12 h-12 rounded-lg bg-red-700 border-2 border-gray-300 opacity-60" title="Warm Red"></div>
                                            <div class="w-12 h-12 rounded-lg bg-orange-300 border-2 border-gray-300 opacity-60" title="Peach"></div>
                                            <div class="w-12 h-12 rounded-lg bg-amber-800 border-2 border-gray-300 opacity-60" title="Brown"></div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">⚖️ Neutral (Balanced)</h3>
                                <p class="text-gray-700 mb-6">Kulit Anda memiliki undertone yang seimbang antara warm dan cool. Anda beruntung karena hampir semua warna akan terlihat bagus pada Anda, namun ada beberapa yang lebih menonjol.</p>
                                
                                <div class="grid md:grid-cols-2 gap-6 mb-8">
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-4">Warna yang Sangat Cocok:</h4>
                                        <div class="flex flex-wrap gap-3">
                                            <div class="w-12 h-12 rounded-lg bg-teal-500 border-2 border-gray-300" title="Teal"></div>
                                            <div class="w-12 h-12 rounded-lg bg-purple-600 border-2 border-gray-300" title="Purple"></div>
                                            <div class="w-12 h-12 rounded-lg bg-gray-700 border-2 border-gray-300" title="Gray"></div>
                                            <div class="w-12 h-12 rounded-lg bg-rose-600 border-2 border-gray-300" title="Rose"></div>
                                            <div class="w-12 h-12 rounded-lg bg-emerald-600 border-2 border-gray-300" title="Emerald"></div>
                                            <div class="w-12 h-12 rounded-lg bg-blue-600 border-2 border-gray-300" title="Blue"></div>
                                            <div class="w-12 h-12 rounded-lg bg-amber-700 border-2 border-gray-300" title="Brown"></div>
                                            <div class="w-12 h-12 rounded-lg bg-white border-2 border-gray-300" title="White"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 mb-4">Tips:</h4>
                                        <ul class="text-gray-700 space-y-2 text-sm">
                                            <li>✓ Cobalah emas dan perak, keduanya cocok</li>
                                            <li>✓ Gunakan warna-warna saturasi tinggi</li>
                                            <li>✓ Warna netral seperti gray dan taupe sempurna</li>
                                            <li>✓ Hindari warna yang terlalu pucat saja</li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Summary Sidebar -->
                <div class="md:col-span-1">
                    <div class="bg-white rounded-lg shadow-lg p-6 mb-6 sticky top-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">📋 Ringkasan</h3>
                        <div class="space-y-4">
                            <div class="pb-4 border-b">
                                <p class="text-sm text-gray-600 mb-1">Tone Kulit</p>
                                <p class="font-semibold text-gray-900 capitalize">{{ $skinTone ?? 'Warm' }}</p>
                            </div>
                            <div class="pb-4 border-b">
                                <p class="text-sm text-gray-600 mb-1">Warna Rambut</p>
                                <p class="font-semibold text-gray-900 capitalize">{{ $hairColor ?? '-' }}</p>
                            </div>
                            <div class="pb-4 border-b">
                                <p class="text-sm text-gray-600 mb-1">Warna Mata</p>
                                <p class="font-semibold text-gray-900 capitalize">{{ $eyeColor ?? '-' }}</p>
                            </div>
                            <div class="pb-4 border-b">
                                <p class="text-sm text-gray-600 mb-1">Kecerahan Kulit</p>
                                <p class="font-semibold text-gray-900 capitalize">{{ $skinBrightness ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600 mb-1">Aksesori Logam</p>
                                <p class="font-semibold text-gray-900">
                                    @if(($skinTone ?? 'warm') === 'warm')
                                        Emas (Gold)
                                    @elseif(($skinTone ?? 'warm') === 'cool')
                                        Perak (Silver)
                                    @else
                                        Keduanya cocok
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-lg p-6 mb-6">
                        <h4 class="font-semibold text-gray-900 mb-3">💡 Tip Penting</h4>
                        <p class="text-sm text-gray-700">Gunakan hasil ini sebagai panduan dalam memilih pakaian, makeup, dan aksesori untuk penampilan yang optimal!</p>
                    </div>

                    <form method="POST" action="{{ route('personalcolor.basic.save-result') }}" class="mb-4">
                        @csrf
                        <input type="hidden" name="name" value="">
                        <button type="button" onclick="document.getElementById('saveModal').classList.remove('hidden')" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 hover:shadow-lg text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                            💾 Simpan Hasil
                        </button>
                    </form>

                    <form method="POST" action="{{ route('personalcolor.basic.reset') }}">
                        @csrf
                        <button type="submit" class="w-full bg-gray-300 hover:bg-gray-400 text-gray-900 font-bold py-3 px-8 rounded-lg transition duration-300">
                            ← Mulai Ulang
                        </button>
                    </form>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="grid md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">👗 Tips Fashion</h3>
                    <ul class="space-y-3 text-gray-700 text-sm">
                        <li><span class="font-semibold">Pakaian Casual:</span> Gunakan warna-warna dari palet Anda yang cocok</li>
                        <li><span class="font-semibold">Formal Wear:</span> Pilih warna netral dari palet Anda</li>
                        <li><span class="font-semibold">Aksesori:</span> Sesuaikan dengan warna mata dan rambut Anda</li>
                        <li><span class="font-semibold">Mix & Match:</span> Kombinasikan 2-3 warna dari palet Anda</li>
                    </ul>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">💄 Tips Makeup</h3>
                    <ul class="space-y-3 text-gray-700 text-sm">
                        <li><span class="font-semibold">Foundation:</span> Cocokkan dengan undertone Anda</li>
                        <li><span class="font-semibold">Blush:</span> Gunakan warna yang sesuai undertone</li>
                        <li><span class="font-semibold">Lipstick:</span> Pilih dari palet warna Anda</li>
                        <li><span class="font-semibold">Eyeshadow:</span> Eksperimen dengan warna dari palet</li>
                    </ul>
                </div>
            </div>

            <!-- Print Button -->
            <div class="flex justify-center mb-8">
                <button onclick="window.print()" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                    🖨️ Cetak Hasil
                </button>
            </div>
        </div>
    </div>

    <!-- Save Modal -->
    <div id="saveModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg shadow-2xl max-w-md w-full p-6">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Simpan Hasil Analisis</h3>
            <p class="text-gray-600 mb-6">Masukkan data Anda untuk menyimpan hasil analisis</p>

            <form method="POST" action="{{ route('personalcolor.basic.save-result') }}">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="Masukkan nama Anda">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="Masukkan email Anda">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon (Opsional)</label>
                    <input type="tel" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="Masukkan nomor telepon">
                </div>

                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="accept_marketing" class="w-4 h-4 text-purple-600">
                        <span class="ml-2 text-sm text-gray-600">Saya setuju menerima tips & promosi menarik</span>
                    </label>
                </div>

                <div class="flex gap-3">
                    <button type="button" onclick="document.getElementById('saveModal').classList.add('hidden')" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-900 font-bold py-2 px-4 rounded-lg transition duration-300">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 bg-gradient-to-r from-purple-600 to-pink-600 hover:shadow-lg text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
=======
@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="text-center mb-4">Hasil Personal Color Kamu 🎨</h2>

    <div class="card shadow p-4">

        {{-- Skin Tone --}}
        <h4 class="mb-3">✨ Skin Tone Anda</h4>
        <p class="fs-5">
            <strong>{{ ucfirst(session('skin_tone')) }}</strong>
        </p>

        {{-- Undertone --}}
        <h4 class="mt-4 mb-3">✨ Undertone Anda</h4>
        <p class="fs-5">
            <strong>{{ ucfirst(session('undertone')) }}</strong>
        </p>

        <hr>

        {{-- Personal Color Result --}}
        <h3 class="text-center mt-4">💡 Personal Color Type Anda:</h3>

        @php
            $undertone = session('undertone');
            $result = '';

            if ($undertone === 'warm') {
                $result = 'Warm Tone (Spring / Autumn)';
            } elseif ($undertone === 'cool') {
                $result = 'Cool Tone (Summer / Winter)';
            } else {
                $result = 'Neutral Tone (Universal Colors)';
            }
        @endphp

        <h2 class="text-center text-primary mt-2">
            <strong>{{ $result }}</strong>
        </h2>

        <hr>

        {{-- Color Recommendations --}}
        <h4 class="mt-4 mb-3">🎯 Rekomendasi Warna</h4>

        @if ($undertone === 'warm')
            <ul>
                <li>Peach</li>
                <li>Olive</li>
                <li>Caramel</li>
                <li>Golden Brown</li>
                <li>Warm Red</li>
            </ul>
        @elseif ($undertone === 'cool')
            <ul>
                <li>Lavender</li>
                <li>Navy</li>
                <li>Burgundy</li>
                <li>Cool Pink</li>
                <li>Ice Blue</li>
            </ul>
        @else
            <ul>
                <li>Soft Pink</li>
                <li>Dusty Rose</li>
                <li>Beige</li>
                <li>Teal</li>
                <li>Charcoal</li>
            </ul>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('personal-color.basic.start') }}" class="btn btn-secondary">
                Ulangi Tes
            </a>
        </div>

    </div>
</div>
@endsection

