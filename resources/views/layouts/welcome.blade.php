@extends('layouts.app')

@section('content')
<div class="text-center mt-5">
    <h1>Selamat Datang 👋</h1>
    <p>Mulai analisis warna personalmu sekarang.</p>

    <a href="{{ route('personal-color.start') }}" class="btn btn-primary">
        Mulai Test
    </a>
</div>
@endsection
