@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Rekomendasi Warna</h2>

    <div class="card p-4 shadow-sm">
        <h4 class="text-center">Hasil Analisa Kulit Kamu</h4>

        <p class="text-center mt-3">
            <strong>Skin Tone:</strong> {{ $skin }} <br>
            <strong>Undertone:</strong> {{ $undertone }}
        </p>

        <hr>

        <h5>🎨 Rekomendasi Warna:</h5>

        <ul>
            @foreach ($colors as $color)
                <li>{{ $color }}</li>
            @endforeach
        </ul>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="btn btn-primary">Mulai Lagi</a>
        </div>
    </div>
</div>
@endsection
