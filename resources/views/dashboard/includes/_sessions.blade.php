<script>

    // show success message
    @session('success')
        Swal.fire({
            icon: "success",
            title: "{{ session('success') }}",
            timer: 2000
        });
    @endsession
    // show deleted message
    @session('deleted')
        Swal.fire({
            icon: "error",
            title: "{{ session('deleted') }}",
            timer: 2000
        });
    @endsession
    // show error message
    @session('error')
        Swal.fire({
            icon: "error",
            title: "{{ session('error')['title'] }}",
            text: "{{ session('error')['message'] }}",
            timer: 2000
        });
    @endsession
</script>
