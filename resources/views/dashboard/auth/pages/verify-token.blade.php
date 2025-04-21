@extends('dashboard.auth.layout.app')

@section('content')

    <h4 class="mb-1">Verification Code 💬</h4>
    <p class="text-start mb-6">
        We sent a verification code to your email. Enter the code from the email in the field below.
        <span class="fw-medium d-block mt-1 text-heading">

            {{ substr(session('reset_email'), 0, 3) . '******' . substr(session('reset_email'), strpos(session('reset_email'), '@')) }}
        </span>
    </p>
    <p class="mb-0">Type your 6 digit security code</p>
    <form id="twoStepsForm" action="{{ route('admin.auth.password.verify-token') }}" method="POST"
        class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
        @csrf
        @method('post')
        @include('dashboard.includes._sessions')
        <div class="mb-6 form-control-validation fv-plugins-icon-container">
            <div class="auth-input-wrapper d-flex align-items-center justify-content-between numeral-mask-wrapper">
                <input type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-sm-1 mt-2"
                    maxlength="1" autofocus="">
                <input type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-sm-1 mt-2"
                    maxlength="1">
                <input type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-sm-1 mt-2"
                    maxlength="1">
                <input type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-sm-1 mt-2"
                    maxlength="1">
                <input type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-sm-1 mt-2"
                    maxlength="1">
                <input type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-sm-1 mt-2"
                    maxlength="1">
            </div>
            <!-- Create a hidden field which is combined by 3 fields above -->
            <input type="hidden" name="token" >
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        <button class="btn btn-primary d-grid w-100 mb-6">Verify my account</button>
        <div class="text-center">
            Didn't get the code?
            <a class="resend" href="javascript:void(0);" onclick="handleResend()">Resend</a>
        </div>
        <input type="hidden">
    </form>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {


            let timerDuration = 120;
            const resendButton = document.querySelector('.resend');
            const updateTimer = () => {
                if (timerDuration > 0) {
                    const minutes = Math.floor(timerDuration / 60);
                    const seconds = timerDuration % 60;
                    resendButton.textContent = `Resend (${minutes}:${seconds.toString().padStart(2, '0')})`;
                    resendButton.style.pointerEvents = 'none';
                    resendButton.setAttribute('disabled', true);
                    timerDuration--;
                    setTimeout(updateTimer, 1000);
                } else {
                    resendButton.textContent = "Resend";
                    resendButton.style.pointerEvents = 'auto';
                    resendButton.removeAttribute('disabled');
                }
            };

            const handleResend = () => {
                fetch('{{ route('admin.auth.password.email') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            email: '{{ session('reset_email') }}'
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Verification code resent!',
                                text: 'A new verification code has been sent to your email.',
                                confirmButtonText: 'OK',
                                timer: 2000,
                            });
                            timerDuration = 120;
                            updateTimer();
                        } else {
                            throw new Error(data.message || 'Failed to resend verification code');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while resending the verification code.',
                            confirmButtonText: 'OK',
                        });
                    });
            };

            resendButton.addEventListener('click', handleResend);
            updateTimer();

            const inputs = document.querySelectorAll('.numeral-mask');
            const hiddenInput = document.querySelector('input[name="token"]');

            inputs.forEach((input, index) => {
                input.addEventListener('input', (e) => {
                    if (e.target.value.length === e.target.maxLength) {
                        const next = inputs[index + 1];
                        if (next) next.focus();
                    }

                    hiddenInput.value = Array.from(inputs).map(i => i.value).join('');
                });

                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && e.target.value === '') {
                        const prev = inputs[index - 1];
                        if (prev) prev.focus();
                    }
                });
            });
        });
    </script>
@endpush
