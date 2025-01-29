@extends('layouts.auth')  

@section('title', 'Login')  

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg" style="max-width: 400px; width: 100%;">
        <div class="card-body">
            <h4 class="card-title text-center mb-4">Login</h4>
            
            <!-- Display error messages -->
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf  

                <!-- Email input -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required placeholder="Enter your email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Enter your password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Submit button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>

                <div class="text-center mt-3">
                    <p>Don't have an account? <a href="{{ route('register') }}">Sign up here</a></p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
