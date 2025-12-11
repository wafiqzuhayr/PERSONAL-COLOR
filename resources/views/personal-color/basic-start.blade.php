@extends('layouts.app') 
{{-- Jika tidak menggunakan layout, hapus baris ini dan pastikan Anda menyertakan tag <html>, <head>, dan <body> --}}

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="max-w-2xl w-full text-center">
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-amber-900 mb-2">Step 1 of 4: Skin Tone</h1>
            <p class="text-lg text-amber-800">Coba tentukan undertone kulit Anda.</p>
        </div>

        <form action="{{ route('personalcolor.basic.q1') }}" method="POST" class="bg-white p-8 rounded-xl shadow-2xl border border-pink-100">
            @csrf
            
            <p class="text-xl font-semibold text-amber-900 mb-8">
                Saat Anda melihat urat nadi di pergelangan tangan Anda di bawah cahaya alami, warna apa yang paling menonjol?
            </p>

            <div class="space-y-6">
                <label class="flex items-center p-4 border-2 border-amber-300 rounded-lg cursor-pointer transition-all duration-200 hover:bg-amber-50 group">
                    <input type="radio" name="undertone" value="warm" required class="form-radio h-5 w-5 text-amber-600 focus:ring-amber-500">
                    <span class="ml-4 text-left">
                        <span class="block text-lg font-medium text-amber-900 group-hover:text-amber-800">Hijau atau Hijau Kebiruan</span>
                        <span class="block text-sm text-gray-500">Ini menunjukkan undertone Hangat (Warm).</span>
                    </span>
                </label>

                <label class="flex items-center p-4 border-2 border-purple-300 rounded-lg cursor-pointer transition-all duration-200 hover:bg-purple-50 group">
                    <input type="radio" name="undertone" value="cool" required class="form-radio h-5 w-5 text-purple-600 focus:ring-purple-500">
                    <span class="ml-4 text-left">
                        <span class="block text-lg font-medium text-amber-900 group-hover:text-purple-800">Biru atau Ungu Kebiruan</span>
                        <span class="block text-sm text-gray-500">Ini menunjukkan undertone Dingin (Cool).</span>
                    </span>
                </label>
                
                <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer transition-all duration-200 hover:bg-gray-50 group">
                    <input type="radio" name="undertone" value="neutral" required class="form-radio h-5 w-5 text-gray-600 focus:ring-gray-500">
                    <span class="ml-4 text-left">
                        <span class="block text-lg font-medium text-amber-900 group-hover:text-gray-800">Campuran Hijau dan Biru/Ungu</span>
                        <span class="block text-sm text-gray-500">Ini menunjukkan undertone Netral (Neutral).</span>
                    </span>
                </label>
            </div>

            <div class="mt-10">
                <button type="submit"
                    class="w-full px-8 py-3 bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white font-bold text-xl rounded-full shadow-lg transition-all duration-300 transform hover:scale-[1.02]">
                    Lanjutkan ke Langkah 2
                </button>
            </div>
        </form>
    </div>
</div>
@endsection