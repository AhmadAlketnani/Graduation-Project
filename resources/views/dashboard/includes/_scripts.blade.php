
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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.delete', function(e) {
        e.preventDefault();

        var form = $(this).closest('form');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });


    function showZoomedImage(image) {
        const zoomedImage = document.createElement('img');
        zoomedImage.src = image;
        zoomedImage.style.position = 'absolute';
        zoomedImage.style.width = '200px';
        zoomedImage.style.height = '200px';
        zoomedImage.style.border = '1px solid #ccc';
        zoomedImage.style.borderRadius = '5%';
        zoomedImage.style.background = '#fff';
        zoomedImage.style.zIndex = '1000000000000000000000000000000';
        zoomedImage.id = 'zoomedImage';

        document.body.appendChild(zoomedImage);

        document.addEventListener('mousemove', function(event) {
            const zoomedImg = document.getElementById('zoomedImage');
            if (zoomedImg) {
                zoomedImg.style.top = event.pageY + 10 + 'px';
                zoomedImg.style.left = event.pageX + 10 + 'px';
            }
        });
    }

    function hideZoomedImage() {
        const zoomedImage = document.getElementById('zoomedImage');
        if (zoomedImage) {
            zoomedImage.remove();
        }
    }



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
    //     @if (session('message'))
    //         Swal.fire({
    //             title: 'خطأ!',
    //             text: "{{ session('message') }}",
    //             icon: "{{ session('m-class', 'error') }}",
    //         })
    //         {{ Session::forget('message') }}
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
