@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Step 1: Pilih Skin Tone</h2>

    <form action="{{ route('undertone') }}" method="GET">
        <div class="row justify-content-center">

            <div class="col-md-3 text-center">
                <input type="radio" name="skin" value="light" required>
                <p>Light</p>
            </div>

            <div class="col-md-3 text-center">
                <input type="radio" name="skin" value="medium">
                <p>Medium</p>
            </div>

            <div class="col-md-3 text-center">
                <input type="radio" name="skin" value="dark">
                <p>Dark</p>
            </div>

        </div>

        <div class="text-center mt-4">
            <button class="btn btn-primary">Lanjut</button>
        </div>
    </form>
</div>
@endsection
