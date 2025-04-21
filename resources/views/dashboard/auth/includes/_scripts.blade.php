<script src="{{ asset('dashboard-auth-asset/vendor/libs/jquery/jquery.js') }}"></script>

<script src="{{ asset('dashboard-auth-asset/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('dashboard-auth-asset/vendor/js/bootstrap.js') }}"></script>

<script src="{{ asset('dashboard-auth-asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('dashboard-auth-asset/vendor/js/menu.js') }}"></script>


<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->

<script src="{{ asset('dashboard-auth-asset/js/main.js') }}"></script>

<!-- Page JS -->

<script src="{{asset('dashboard-assets/vendor/js/custom/theme-switcher.js')}}"></script>

<script>
    // This function is used to toggle the password visibility
    function toggle(span, password) {
        // Get the input field and check if it is a password field
        const input = document.querySelector('#' + password);
        const icon = span.querySelector('i');
        // Toggle the type attribute
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        // Toggle icon class only
        icon.classList.toggle('ti-eye');
        icon.classList.toggle('ti-eye-off');

    }

    function togglePassword(span) {
        console.log(span);

    const input = span.parentElement.querySelector('input');
    const icon = span.querySelector('i');

    // Toggle the type attribute
    const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        // Toggle icon class only
        icon.classList.toggle('ti-eye');
        icon.classList.toggle('ti-eye-off');
  }
</script>


@stack('scripts')
