@extends('dashboard.auth.layout.app')

@section('content')
    <h4 class="mb-1">Reset Password 🔒</h4>
    <p class="mb-6"><span class="fw-medium">Your new password must be different from previously used passwords</span></p>

    <form id="formAuthentication" action="{{ route('admin.auth.password.update') }}}}" method="post"
        class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
        @csrf
        @method('post')
        @include('dashboard.includes._sessions')
        <div class="mb-6 form-password-toggle form-control-validation fv-plugins-icon-container">
            <label class="form-label" for="password">New Password</label>
            <div class="input-group input-group-merge has-validation">
                <input type="password" id="password" class="form-control" name="password" placeholder="············"
                    aria-describedby="password">
                <span class="input-group-text cursor-pointer"><i class="icon-base ti ti-eye"></i></span>
            </div>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        <div class="mb-6 form-password-toggle form-control-validation fv-plugins-icon-container">
            <label class="form-label" for="confirm-password">Confirm Password</label>
            <div class="input-group input-group-merge has-validation">
                <input type="password" id="confirm-password" class="form-control" name="confirm-password"
                    placeholder="············" aria-describedby="password">
                <span class="input-group-text cursor-pointer"><i class="icon-base ti ti-eye"></i></span>
            </div>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        <button class="btn btn-primary d-grid w-100 mb-6">Set new password</button>
        <div class="text-center">
            <a href="auth-login-basic.html">
                <i class="icon-base bx bx-chevron-left scaleX-n1-rtl me-1 align-top"></i>
                Back to login
            </a>
        </div>
        <input type="hidden">
    </form>
@endsection


