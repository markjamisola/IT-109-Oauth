@extends('layouts.app')

@section('content')
<div class="animated-background">
    <!-- Background Icons -->
    <div class="anim-elements">
        @for ($i = 1; $i <= 20; $i++) <!-- Increased number of floating icons -->
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

    <!-- Main Content -->
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <!-- Logo and Description -->
        <div class="text-center d-flex flex-column justify-content-center align-items-center" style="width: 50%; height: 100%;">
            <img src="{{ asset('logo/newlogo.png') }}" alt="Logo" style="max-width: 250px;">
            <h2 class="text-light mt-3">Learn Smarter, Succeed Faster</h2>
            <p class="text-light">
                Your one-stop portal for IT, IS, and CS resources, tailored to support your academic journey.
            </p>
        </div>

        <!-- Login Form Card -->
        <div class="card p-4" style="width: 40%; border-radius: 12px; background: #FAEED1; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <h2 class="text-#803d3b text-center mt-2">Log In</h2>
                    <label for="email" class="form-label">Account</label>
                    <div class="input-group form-outline">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" placeholder="        Registered Email" required autofocus>
                        <i class="mdi mdi-email-outline"></i>
                    </div>
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group form-outline">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                               name="password" placeholder="        Enter your password" required autofocus>
                            <i class="mdi mdi-lock-outline"></i>
                    </div>
                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Log In</button>
            </form>

            <!-- Divider -->
            <div class="text-center my-3">
                <span>or</span>
            </div>

            <!-- Login with Google -->
            <a href="{{ route('google.redirect') }}" class="btn btn-danger w-100">
                 Log in with Google  <i class="mdi mdi-google"></i>
            </a>
        </div>
    </div>
</div>

<!-- Styles -->
<style>
    @import url('https://fonts.cdnfonts.com/css/unbounded');

    * {
        font-family: 'Unbounded', sans-serif;
    }

    /* Make sure the body and html cover the full height */
    html, body {
        height: 100%;
        margin: 0;
        overflow-x: hidden; /* Prevent horizontal scroll */
    }

    .animated-background {
        background: #803d3b; 
        position: relative;
        height: 100%; /* Full height */
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
    }

    .btn-primary {
        background: #803d3b;
        border-color: #803d3b;
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

    .form-outline i {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        padding-left: 15px;
    }

    .btn-danger:hover {
        transform: scale(1.05);
        background: #a23232;
    }

    .input-group-text {
        background: #FAEED1;
        border: none;
        color: #803d3b;
    }

    .input-group input {
        border-right: none;
    }

    .input-group-text {
        border-left: none;
    }

    h2, p {
        color: #FAEED1;
    }

</style>
@endsection
