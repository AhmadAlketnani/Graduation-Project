<script src="{{asset('dashboard-assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('dashboard-assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('dashboard-assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('dashboard-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('dashboard-assets/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{asset('dashboard-assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->
<script src="{{asset('dashboard-assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<link rel="stylesheet" href="{{asset('dashboard-assets/vendor/libs/toastr/toastr.js')}}" />
<!-- Main JS -->
<script src="{{asset('dashboard-assets/js/typeahead.js')}}"></script>
<script src="{{asset('dashboard-assets/js/main.js')}}"></script>
<script src="{{asset('dashboard-assets/vendor/js/custom/theme-switcher.js')}}"></script>
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// toastr.options = {
//     "closeButton": false,
//     "debug": false,
//     "newestOnTop": false,
//     "progressBar": false,
//     "positionClass": "toastr-top-right",
//     "preventDuplicates": false,
//     "onclick": null,
//     "showDuration": "300",
//     "hideDuration": "1000",
//     "timeOut": "5000",
//     "extendedTimeOut": "1000",
//     "showEasing": "swing",
//     "hideEasing": "linear",
//     "showMethod": "fadeIn",
//     "hideMethod": "fadeOut"
//     };
//     @if(session('message'))
//         Swal.fire({
//             title: 'خطأ!',
//             text: "{{session('message')}}",
//             icon: "{{session('m-class',"error")}}",
//         })
//         {{Session::forget('message')}}
//     @endif
</script>
@stack('scripts')

{{-- <script>
    $(document).ready(function() {
        to confirm delete opration
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
    select2 call
    $('.select2').select2({
        width: '100%'
    })
</script> --}}
