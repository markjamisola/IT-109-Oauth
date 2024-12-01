@extends('layouts.app')

@section('content')
<div class="animated-background d-flex align-items-center justify-content-center" style="height: 100vh; margin: 0; padding: 0;">
    <div class="container text-center">
        <!-- Welcome Message -->
        <div class="mb-4">
            @if($user)
                <h1 class="text-light">Welcome, {{ $user->name }}!</h1>
            @else
                <h1 class="text-light">Welcome to Your Dashboard!</h1>
            @endif
        </div>

        <!-- User Info Card -->
        <div class="card shadow-lg border-0 mx-auto p-4" style="max-width: 700px; border-radius: 15px; background-color: #FAEED1; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);">
            @if($user) <!-- Check if user data is available -->
            <div class="card-body text-center">
                <div class="profile-avatar mb-4">
                    <img src="{{ $user->avatar }}" alt="Avatar" class="rounded-circle border" width="150" height="150">
                </div>
                <h4 class="fw-bold">{{ $user->name }}</h4>
                <p class="text-muted mb-1"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="text-muted"><strong>Google ID:</strong> {{ $user->id }}</p>
                <div class="mt-4">
                    <a href="{{ route('logout') }}" class="btn btn-danger px-4"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            @else
            <div class="text-center mt-5">
                <h2>No user data available</h2>
                <p class="text-muted">Please log in to view your account information.</p>
                <a href="{{ route('google.redirect') }}" class="btn btn-primary">Sign In with Google</a>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Add floating background icons -->
<div class="anim-elements">
    @for ($i = 1; $i <= 20; $i++) <!-- Add more floating icons -->
        <div class="anim-element" style="
            --i: {{ $i }};
            top: {{ rand(0, 120) }}vh;
            left: {{ rand(0, 150) }}vw;
            animation-duration: {{ rand(8, 15) }}s;
            font-size: {{ rand(30, 80) }}px;
        ">
            <i class="mdi mdi-language-html5"></i>
        </div>
    @endfor
</div>

<!-- Styles -->
<style>
    @import url('https://fonts.cdnfonts.com/css/unbounded');

    * {
        font-family: 'Unbounded', sans-serif;
    }

    .animated-background {
        background: #803d3b;
        position: relative;
        overflow: hidden;
    }

    .anim-elements {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .anim-element {
        position: absolute;
        animation: float 8s infinite linear;
        color: rgba(255, 255, 255, 0.15);
    }

    @keyframes float {
        0% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-40px);
        }
        100% {
            transform: translateY(0);
        }
    }

    .card {
        background: #FAEED1;
        border-radius: 15px;
    }

    .btn-primary {
        background: #803d3b;
        border: none;
        transition: transform 0.3s, background 0.3s;
    }

    .btn-primary:hover {
        transform: scale(1.05);
        background: #5f2b2a;
    }

    .btn-danger {
        background: #c44c4c;
        transition: transform 0.3s, background 0.3s;
    }

    .btn-danger:hover {
        transform: scale(1.05);
        background: #a23232;
    }

    h1 {
        font-size: 2.5rem;
        color: #FAEED1;
    }

    h4, p {
        color: #803d3b;
    }

    .profile-avatar img {
        border: 5px solid #FAEED1;
    }

    /* Remove unintended white space at bottom */
    body {
        margin: 0;
        padding: 0;
        height: 100%;
    }
    html {
        height: 100%;
        overflow: hidden;
    }
</style>
@endsection
