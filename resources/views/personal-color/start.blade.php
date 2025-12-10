@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to Personal Color Test 🎨</h1>

    <a href="{{ route('personal-color.basic.skin-tone') }}" class="btn btn-primary">
        Start Test
    </a>
</div>
@endsection
