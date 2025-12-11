@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="text-center">Hasil Analisis Warna ✨</h2>

    <div class="card mt-4 p-4">
        <h4>Skin Tone: {{ ucfirst($skin) }}</h4>
        <h4>Undertone: {{ ucfirst($undertone) }}</h4>

        <hr>

        <p><strong>Rekomendasi Warna:</strong></p>
        <p>{{ $colorResult }}</p>

        <div class="text-center mt-3">
            <a href="{{ route('personal-color.complete') }}" class="btn btn-success">
                Selesai
            </a>
        </div>
    </div>

</div>
@endsection
