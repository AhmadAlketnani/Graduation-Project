@extends('dashboard.auth.layout.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('dashboard-asset/vendor/css/pages/page-auth.css') }}" />
@endpush
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

@push('scripts')
    <script>
        document.getElementById('formAuthentication').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            const submitButton = document.querySelector('button[type="submit"]');
            const form = this;

            // Disable the submit button to prevent multiple submissions
            submitButton.disabled = true;

            // Simulate form submission (replace this with actual AJAX if needed)
            setTimeout(() => {
                // Show success message
                const successMessage = document.createElement('div');
                successMessage.textContent = 'Time over!';
                successMessage.style.color = 'green';
                successMessage.style.marginTop = '10px';
                successMessage.id = 'successMessage';
                form.appendChild(successMessage);

                // Remove the success message after 1 minute
                setTimeout(() => {
                    if (successMessage) {
                        successMessage.remove();
                    }
                    submitButton.disabled = false; // Re-enable the submit button
                }, 60000); // 1 minute
            }, 1000); // Simulate a delay for form submission
        });
    </script>
@endpush
