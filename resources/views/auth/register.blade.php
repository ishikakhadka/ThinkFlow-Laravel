@extends('layout.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="bg-light p-4 rounded shadow mt-5" action="" method="post">
                @csrf
                <h3 class="text-center text-primary mb-4">Create Account</h3>

               
                <div class="mb-3">
                    <label for="name" class="form-label text-dark">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" placeholder="Enter your full name">
                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="email" class="form-label text-dark">Email Address</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" placeholder="Enter your email">
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label text-dark">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Create a password">
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="confirm-password" class="form-label text-dark">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="confirm-password"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="Re-enter your password">
                    @error('password_confirmation')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>


                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>


                <div class="text-center mt-3">
                    <small class="text-muted">Already have an account? <a href="/login" class="text-primary">Login here</a></small>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
