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
            <input type="hidden" name="token">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
        <button class="btn btn-primary d-grid w-100 mb-6">Verify my account</button>
        <div class="text-center">
            Didn't get the code?
            <a class="resend" href="javascript:void(0);" >Resend</a>
        </div>
        <input type="hidden">
    </form>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {


            /*   const countdownSeconds = 120;
              const resendButton = $('.resend');

              function getRemainingTime() {
                  const storedTime = localStorage.getItem('resend_timer_start');
                  if (storedTime) {
                      const start = parseInt(storedTime);
                      const elapsed = Math.floor((Date.now() - start) / 1000);
                      return Math.max(countdownSeconds - elapsed, 0);
                  }
                  return 0;
              }

              function startCountdown(remaining) {
                  resendButton.css('pointer-events', 'none').text('');
                  const interval = setInterval(() => {
                      if (remaining > 0) {
                          const minutes = String(Math.floor(remaining / 60)).padStart(2, '0');
                          const seconds = String(remaining % 60).padStart(2, '0');
                          resendButton.text(`Resend (${minutes}:${seconds})`);
                          resendButton.css('pointer-events', 'none');
                          remaining--;
                      } else {
                          clearInterval(interval);
                          resendButton.text('Resend');
                          resendButton.css('pointer-events', 'auto');
                          localStorage.removeItem('resend_timer_start');
                          resendButton.off('click').on('click', handleResend);
                      }
                  }, 1000);
              }

              function handleResend() {
                  resendButton.css('pointer-events', 'none');
                  $.ajax({
                      url: '{{ route('admin.auth.password.email') }}',
                      method: 'POST',
                      headers: {
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      },
                      data: {
                          email: '{{ session('reset_email') }}'
                      },
                      success: function(response) {
                          if (response.success) {
                              Swal.fire({
                                  icon: 'success',
                                  title: 'Verification code resent!',
                                  text: 'A new verification code has been sent to your email.',
                                  timer: 2000
                              });
                              localStorage.setItem('resend_timer_start', Date.now().toString());
                              startCountdown(countdownSeconds);
                          } else {
                              Swal.fire({
                                  icon: 'error',
                                  title: 'Error',
                                  text: response.message || 'Failed to resend verification code.',
                              });
                              resendButton.css('pointer-events', 'auto');
                          }
                      },
                      error: function() {
                          Swal.fire({
                              icon: 'error',
                              title: 'Error',
                              text: 'An error occurred while resending the verification code.',
                          });
                          resendButton.css('pointer-events', 'auto');
                      }
                  });
              }

              // On page load
              const remaining = getRemainingTime();
              if (remaining > 0) {
                  startCountdown(remaining);
              } else {
                  resendButton.text('Resend');
                  resendButton.css('pointer-events', 'auto');
                  resendButton.on('click', handleResend);
              } */





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
    {{-- <script src="{{ asset('dashboard-auth-asset/vendor/js/cutom.js') }}"></script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Elements
            const timerElement = document.querySelector(".resend")


            function startTimer() {
                if (!localStorage.getItem("complete")) {
                    // Timer duration in seconds (2 minutes)
                    const totalDuration = 2 * 60

                    // Check if there's a stored end time in localStorage
                    let endTime
                    const storedEndTime = localStorage.getItem("resetTimerEndTime")

                    if (storedEndTime) {
                        endTime = Number.parseInt(storedEndTime, 10)
                    } else {
                        // Set a new end time (current time + 2 minutes)
                        endTime = Date.now() + totalDuration * 1000
                        localStorage.setItem("resetTimerEndTime", endTime.toString())
                        timerElement.disabled = true // Disable the button initially
                        // change cursor not-allowed
                        timerElement.style.cursor = "not-allowed"
                    }

                    // Calculate initial time left
                    let timeLeft = Math.max(0, Math.floor((endTime - Date.now()) / 1000))

                    // If timer is already complete
                    if (timeLeft <= 0) {
                        timerComplete()
                    } else {
                        // Update timer display initially
                        updateTimerDisplay(timeLeft)

                        // Set up the interval
                        const intervalId = setInterval(() => {
                            timeLeft = Math.max(0, Math.floor((endTime - Date.now()) / 1000))
                            updateTimerDisplay(timeLeft)

                            if (timeLeft <= 0) {
                                clearInterval(intervalId)
                                timerComplete()
                            }
                        }, 1000)
                    }
                }

            }

            // Format time as MM:SS
            function formatTime(seconds) {
                const mins = Math.floor(seconds / 60)
                const secs = seconds % 60
                return `Wait ${mins.toString().padStart(2, "0")}:${secs.toString().padStart(2, "0")}`
            }

            // Update timer display
            function updateTimerDisplay(seconds) {
                timerElement.textContent = formatTime(seconds)
            }

            // Handle timer completion
            function timerComplete() {
                timerElement.textContent = "Resend"
                // Enable the button
                timerElement.disabled = false
                timerElement.style.cursor = "pointer"

                // Remove the stored end time
                localStorage.removeItem("resetTimerEndTime")
                localStorage.setItem("complete", true)
            }

            // Start the timer
            startTimer()

            // Handle form submission
            function handleResend() {
                // Prevent submission if timer is not complete
                event.preventDefault()
                // if (timeLeft > 0) {
                //     return
                // }
                Swal.showLoading()
                // Disable the button to prevent multiple clicks
                timerElement.disabled = true
                timerElement.style.cursor = "not-allowed"
                // Send AJAX request to resend the verification code
                $.ajax({
                    url: '{{ route('admin.auth.password.email') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        email: '{{ session('reset_email') }}'
                    },
                    success: function(response) {
                        // Hide the loading spinner
                        Swal.hideLoading()
                        // Check if the response indicates success
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Verification code resent!',
                                text: 'A new verification code has been sent to your email.',
                                timer: 2000
                            });
                            // Reset the timer
                            localStorage.setItem("complete", false)
                            startTimer()
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message ||
                                    'Failed to resend verification code.',
                            });
                            // Enable the button
                            timerElement.disabled = false
                            timerElement.style.cursor = "pointer"
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while resending the verification code.',
                        });
                        resendButton.css('pointer-events', 'auto');
                    }
                });
                // The form will submit normally to the action URL
            }
            timerElement.onclick = handleResend
        })
    </script>
@endpush
