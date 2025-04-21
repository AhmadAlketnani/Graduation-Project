@extends('dashboard.auth.layout.app')


@section('content')
    <h4 class="mb-1">Welcome to Injaz! 👋</h4>
    <p class="mb-6">Please login to your account and start the adventure</p>

    <form id="formAuthentication" class="mb-6" action="{{ route('admin.auth.login') }}" method="post">
        @csrf
        @method('post')
        @include('dashboard.includes._sessions')
        <div class="mb-6">
            <label for="email" class="form-label">Email </label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                placeholder="Enter your email" value="{{ old('email') }}" autofocus />
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-6 form-password-toggle form-control-validation fv-plugins-icon-container">
            <label class="form-label" for="password">Password</label>
            <div class="input-group input-group-merge has-validation">
                <input type="password" id="password" class="form-control @error('email') is-invalid @enderror"
                    name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password">
                <span class="input-group-text cursor-pointer" onclick="togglePassword(this)">
                    <i class="icon-base ti ti-eye"></i>
                </span>
            </div>
            @error('password')
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-8">
            <div class="d-flex justify-content-between">
                <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
                <a href="{{ route('admin.auth.password.request') }}" class="d-flex align-items-center">
                    <span>Forgot Password?</span>
                </a>
            </div>
        </div>
        <div class="mb-6">
            <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
        </div>
    </form>
@endsection
