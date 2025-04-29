document.addEventListener("DOMContentLoaded", () => {
    // Elements
    const timerElement = document.querySelector(".resend")

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

        // Remove the stored end time
        localStorage.removeItem("resetTimerEndTime")
    }

    // Handle form submission
    timerElement.addEventListener("click", (event) => {
        // Prevent submission if timer is not complete
        event.preventDefault()
        if (timeLeft > 0) {
            return
        }
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
            success: function (response) {
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
            error: function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while resending the verification code.',
                });
                resendButton.css('pointer-events', 'auto');
            }
        });
        // The form will submit normally to the action URL
    })
})
