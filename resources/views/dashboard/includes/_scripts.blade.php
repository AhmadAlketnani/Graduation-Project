<!-- Core JS -->

<script src="{{ asset('dashboard-asset/vendor/libs/jquery/jquery.js') }}"></script>

<script src="{{ asset('dashboard-asset/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('dashboard-asset/vendor/js/bootstrap.js') }}"></script>

<script src="{{ asset('dashboard-asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('dashboard-asset/vendor/js/menu.js') }}"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('dashboard-asset/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->

<script src="{{ asset('dashboard-asset/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('dashboard-asset/js/dashboards-analytics.js') }}"></script>

<!-- Place this tag before closing body tag for github widget button. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
{{-- sweetalert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
select2
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

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

    // make effict when hover on the image
    function showZoomedImage(image)
            {
                const zoomedImage = document.createElement('img');
                zoomedImage.src = image;
                zoomedImage.style.position = 'absolute';
                zoomedImage.style.width = '200px';
                zoomedImage.style.height = '200px';
                zoomedImage.style.border = '1px solid #ccc';
                zoomedImage.style.background = '#fff';
                zoomedImage.style.zIndex = '1000';
                zoomedImage.id = 'zoomedImage';

                document.body.appendChild(zoomedImage);

                document.addEventListener('mousemove', function (event) {
                    const zoomedImg = document.getElementById('zoomedImage');
                    if (zoomedImg) {
                        zoomedImg.style.top = event.pageY + 10 + 'px';
                        zoomedImg.style.left = event.pageX + 10 + 'px';
                    }
                });
            }

            function hideZoomedImage()
            {
                const zoomedImg = document.getElementById('zoomedImage');
                if (zoomedImg) {
                    zoomedImg.remove();
                }
            }
</script>
