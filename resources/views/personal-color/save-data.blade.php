@extends('layouts.app')

@section('content')
<h2>Final Step — Save Your Result</h2>

<form action="{{ route('personal-color.basic.save-result') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Phone:</label>
    <input type="text" name="phone" required><br><br>

    <label>Upload Photo (optional):</label>
    <input type="file" name="photo"><br><br>

    <label>
        <input type="checkbox" name="marketing">
        I agree to receive marketing content & recommendations
    </label><br><br>

    <button type="submit">Save Result</button>
</form>
@endsection
