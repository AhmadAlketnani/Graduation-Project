@extends('dashboard.auth.layout.app')

@section('content')
    <h4 class="mb-1">Forgot Password? 🔒</h4>
    <p class="mb-6">Enter your email and we'll send you instructions to reset your password</p>
    <form id="formAuthentication" class="mb-6" action="{{ route('admin.auth.password.email') }}" method="post">
        @csrf
        @method('post')
        @include('dashboard.includes._sessions')
        <div class="mb-6">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                placeholder="Enter your email" autofocus />
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary d-grid w-100">Send Reset Link</button>
    </form>
    <div class="text-center">
        <a href="{{ route('admin.auth.login') }}" class="d-flex justify-content-center">
            <i class="icon-base bx bx-chevron-left me-1"></i>
            Back to login
        </a>
    </div>
@endsection


