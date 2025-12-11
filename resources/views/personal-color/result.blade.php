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
