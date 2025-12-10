@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Step 2: Pilih Undertone</h2>

    <form action="{{ route('result') }}" method="GET">
        <input type="hidden" name="skin" value="{{ request('skin') }}">

        <div class="row justify-content-center">

            <div class="col-md-3 text-center">
                <input type="radio" name="undertone" value="warm" required>
                <p>Warm</p>
            </div>

            <div class="col-md-3 text-center">
                <input type="radio" name="undertone" value="cool">
                <p>Cool</p>
            </div>

            <div class="col-md-3 text-center">
                <input type="radio" name="undertone" value="neutral">
                <p>Neutral</p>
            </div>

        </div>

        <div class="text-center mt-4">
            <button class="btn btn-primary">Lihat Hasil</button>
        </div>
    </form>
</div>
@endsection
