<!-- Core JS -->

<script src="{{ asset('dashboard-asset/vendor/libs/jquery/jquery.js') }}"></script>

<script src="{{ asset('dashboard-asset/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('dashboard-asset/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('dashboard-asset/vendor/libs/@algolia/autocomplete-js.js') }}"></script>



      <script src="{{ asset('dashboard-asset/vendor/libs/pickr/pickr.js') }}"></script>
<script src="{{ asset('dashboard-asset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>


<script src="{{ asset('dashboard-asset/vendor/libs/hammer/hammer.js') }}"></script>

<script src="{{ asset('dashboard-asset/vendor/libs/i18n/i18n.js') }}"></script>

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


{{-- <script src="{{ asset('dashboard-asset/js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('dashboard-asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard-asset/js/main.js') }}"></script>
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
</script>
