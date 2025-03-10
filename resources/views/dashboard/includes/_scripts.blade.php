<script src="{{ asset('dashboard-asset/js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('dashboard-asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard-asset/js/main.js') }}"></script>
{{-- select2  --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
        }
    })

    $(document).ready(function() {
        // to confirm delete opration
        $(document).on('click', '.delete', function(e) {
            e.preventDefault()

            var that = $(this)
            var n = new Noty({
                type: 'alert',
                text: 'Confirm deleting operation',
                killer: true,
                buttons: [
                    Noty.button('Yes', 'btn btn-success mx-2', function() {
                        that.closest('form').submit()
                    }),
                    Noty.button('No', 'btn btn-danger', function() {
                        n.close()
                    }),
                ]
            })
            n.show()
        })

    })
    // select2 call
    $('.select2').select2({
        width: '100%'
    })
</script>
