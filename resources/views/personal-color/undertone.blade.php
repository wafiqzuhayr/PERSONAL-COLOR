@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="text-center mb-4">Step 2: Pilih Undertone Kamu</h2>

    <p class="text-center text-muted mb-4">
        Pilih undertone yang paling sesuai dengan warna dasar kulitmu.
    </p>

    <form action="{{ route('personal-color.basic.undertone.submit') }}" method="POST">
        @csrf

        <div class="row justify-content-center">

            <div class="col-md-3 text-center mb-4">
                <label class="d-block">
                    <input type="radio" name="undertone" value="warm" required>
                    <div class="mt-2 p-3 border rounded">
                        <strong>Warm</strong>
                        <p class="small mb-0">Kuning / keemasan</p>
                    </div>
                </label>
            </div>

            <div class="col-md-3 text-center mb-4">
                <label class="d-block">
                    <input type="radio" name="undertone" value="cool">
                    <div class="mt-2 p-3 border rounded">
                        <strong>Cool</strong>
                        <p class="small mb-0">Kebiruan / merah muda</p>
                    </div>
                </label>
            </div>

            <div class="col-md-3 text-center mb-4">
                <label class="d-block">
                    <input type="radio" name="undertone" value="neutral">
                    <div class="mt-2 p-3 border rounded">
                        <strong>Neutral</strong>
                        <p class="small mb-0">Campuran warm & cool</p>
                    </div>
                </label>
            </div>

        </div>

        <div class="text-center mt-4">
            <button class="btn btn-primary px-5">Lanjut ke Hasil</button>
        </div>

    </form>
</div>
@endsection
