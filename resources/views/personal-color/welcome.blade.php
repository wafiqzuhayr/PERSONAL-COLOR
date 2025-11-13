@extends('layouts.app')

@section('title', 'Find Your Personal Color - Wardah Color Expert')

@push('styles')
<style>
    body {
        background: var(--background-gradient);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .decoration {
        position: absolute;
        filter: blur(1px);
        opacity: 0.8;
    }

    .decoration-1 {
        top: 10%;
        right: 5%;
        width: 150px;
        height: 150px;
    }

    .decoration-2 {
        bottom: 10%;
        left: 5%;
        width: 180px;
        height: 180px;
    }

    .container {
        text-align: center;
        z-index: 10;
        padding: 40px;
        animation: fadeIn 0.6s ease-in;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .logo {
        margin-bottom: 30px;
    }

    .logo-text {
        font-size: 14px;
        color: var(--text-medium);
        letter-spacing: 2px;
    }

    .logo-brand {
        font-size: 18px;
        color: var(--text-medium);
        font-weight: 300;
        letter-spacing: 3px;
    }

    h1 {
        font-size: 42px;
        color: var(--text-dark);
        margin: 20px 0;
        font-weight: 600;
        line-height: 1.2;
    }

    .subtitle {
        font-size: 18px;
        color: var(--text-medium);
        margin-bottom: 50px;
        line-height: 1.6;
    }

    .button-group {
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }

    .btn {
        padding: 18px 60px;
        border-radius: 50px;
        border: none;
        font-size: 18px;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        text-decoration: none;
        display: inline-block;
        min-width: 250px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    .btn-primary {
        background: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background: #6B3947;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .btn-secondary {
        background: var(--secondary-color);
        color: white;
    }

    .btn-secondary:hover {
        background: #7B4F5C;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .step-info {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.9);
        margin-top: 5px;
        font-style: italic;
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 32px;
        }

        .subtitle {
            font-size: 16px;
        }

        .btn {
            min-width: 200px;
            padding: 15px 40px;
        }

        .decoration {
            display: none;
        }
    }
</style>
@endpush

@section('content')
<!-- Decorative Elements -->
<div class="decoration decoration-1">
    <svg width="150" height="150" viewBox="0 0 150 150">
        <circle cx="50" cy="50" r="40" fill="#FF6B9D" opacity="0.6"/>
        <circle cx="100" cy="70" r="35" fill="#C17B8B" opacity="0.7"/>
        <circle cx="80" cy="100" r="30" fill="#FFB6C1" opacity="0.5"/>
    </svg>
</div>

<div class="decoration decoration-2">
    <svg width="180" height="180" viewBox="0 0 180 180">
        <circle cx="60" cy="60" r="50" fill="#FF1744" opacity="0.6"/>
        <circle cx="100" cy="80" r="40" fill="#FF8A80" opacity="0.5"/>
        <circle cx="120" cy="120" r="45" fill="#C17B8B" opacity="0.7"/>
    </svg>
</div>

<div class="container">
    <div class="logo">
        <div class="logo-text">Wardah</div>
        <div class="logo-brand">COLOR EXPERT</div>
    </div>

    <h1>Find Your<br>Personal Color</h1>
    
    <p class="subtitle">
        Get to know your<br>
        personal color to find the<br>
        colors that suit you best!
    </p>

    <div class="button-group">
        <a href="{{ route('personal-color.basic.start') }}" class="btn btn-primary">
            <div>Basic</div>
            <div class="step-info">4 steps</div>
        </a>

        <a href="{{ route('personal-color.expert.start') }}" class="btn btn-secondary">
            <div>Expert</div>
            <div class="step-info">7 steps</div>
        </a>
    </div>
</div>
@endsection