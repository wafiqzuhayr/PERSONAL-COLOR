<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Color Analyzer - COLOR TEST 6</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-gradient-to-br from-pink-50 via-purple-50 to-pink-100 overflow-hidden relative">
        <!-- Decorative Elements - Top Left -->
        <div class="absolute top-0 left-0 w-64 h-64 opacity-40 blur-3xl">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                <defs>
                    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#f472b6;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#ec4899;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <circle cx="100" cy="100" r="80" fill="url(#grad1)"/>
                <circle cx="60" cy="80" r="50" fill="#004cffff" opacity="0.7"/>
            </svg>
        </div>

        <!-- Decorative Elements - Top Right -->
        <div class="absolute top-0 right-0 w-72 h-72 opacity-30 blur-3xl">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                <defs>
                    <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#c084fc;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#a78bfa;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <circle cx="100" cy="100" r="85" fill="url(#grad2)"/>
                <circle cx="140" cy="120" r="55" fill="#ff2200ff" opacity="0.6"/>
            </svg>
        </div>

        <!-- Decorative Elements - Bottom Left -->
        <div class="absolute bottom-0 left-0 w-80 h-80 opacity-35 blur-3xl">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                <defs>
                    <linearGradient id="grad3" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#fda7df;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#f472b6;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <circle cx="100" cy="100" r="90" fill="url(#grad3)"/>
                <circle cx="50" cy="130" r="60" fill="#0040ffff" opacity="0.5"/>
            </svg>
        </div>

        <!-- Decorative Elements - Bottom Right -->
        <div class="absolute bottom-20 right-0 w-96 h-96 opacity-25 blur-3xl">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                <defs>
                    <linearGradient id="grad4" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#fed7aa;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#fbcfe8;stop-opacity:1" />
                    </linearGradient>
                </defs>
                <circle cx="100" cy="100" r="85" fill="url(#grad4)"/>
                <circle cx="130" cy="60" r="50" fill="#ff0000ff" opacity="0.4"/>
            </svg>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 min-h-screen flex items-center justify-center px-4 py-12">
            <div class="max-w-2xl w-full text-center">
                <!-- Header -->
                <div class="mb-8">
                    <p class="text-xl font-light text-amber-900 mb-2 tracking-wider">COLOR TEST 6</p>
                    <p class="text-sm font-semibold text-amber-800 tracking-widest mb-8">COLOR EXPERT</p>
                </div>

                <!-- Title -->
                <h1 class="text-5xl md:text-6xl font-bold text-amber-900 mb-4 leading-tight">
                    Find Your<br>Personal Color
                </h1>

                <!-- Subtitle -->
                <p class="text-lg text-amber-800 mb-16 leading-relaxed max-w-md mx-auto">
                    Get to know your personal color to find the colors that suit you best!
                </p>

                <!-- CTA Buttons -->
                <div class="space-y-4 flex flex-col items-center">
                    <!-- Basic Button -->
                    <a href="{{ route('personalcolor.basic.start') }}" 
                       class="w-full md:w-80 px-8 py-4 bg-gradient-to-r from-amber-700 to-red-700 hover:from-amber-800 hover:to-red-800 text-white font-bold text-lg rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                        <div class="flex flex-col items-center">
                            <span>Basic</span>
                            <span class="text-sm font-normal opacity-90">4 steps</span>
                        </div>
                    </a>

                    <!-- Expert Button -->
                    <button disabled
                       class="w-full md:w-80 px-8 py-4 bg-gradient-to-r from-amber-700 to-red-700 text-white font-bold text-lg rounded-full shadow-lg transition-all duration-300 opacity-50 cursor-not-allowed">
                        <div class="flex flex-col items-center">
                            <span>Expert</span>
                            <span class="text-sm font-normal opacity-90">7 steps</span>
                        </div>
                    </button>
                    <p class="text-xs text-amber-700 mt-2">Coming Soon</p>
                </div>

                <!-- Info Section -->
                <div class="mt-20 pt-12 border-t border-amber-200 border-opacity-50">
                    <p class="text-sm text-amber-800 mb-6">Bagaimana cara kerjanya?</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                        <div class="group hover:scale-105 transition-transform duration-300">
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-br from-pink-200 to-purple-200 mb-3 group-hover:shadow-lg transition-shadow">
                                <span class="text-lg font-bold text-amber-800">1</span>
                            </div>
                            <p class="text-sm text-amber-800 font-medium">Tentukan tone kulit</p>
                        </div>
                        <div class="group hover:scale-105 transition-transform duration-300">
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-br from-pink-200 to-purple-200 mb-3 group-hover:shadow-lg transition-shadow">
                                <span class="text-lg font-bold text-amber-800">2</span>
                            </div>
                            <p class="text-sm text-amber-800 font-medium">Jawab pertanyaan</p>
                        </div>
                        <div class="group hover:scale-105 transition-transform duration-300">
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-br from-pink-200 to-purple-200 mb-3 group-hover:shadow-lg transition-shadow">
                                <span class="text-lg font-bold text-amber-800">3</span>
                            </div>
                            <p class="text-sm text-amber-800 font-medium">Dapatkan hasil</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>