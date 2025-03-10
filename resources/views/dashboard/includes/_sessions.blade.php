<script >
@if(session('success'))

        new Noty({
            type: 'success',
            layout: 'bottomRight',
            text: "{{ session('success') }}",
            timeout:3000,
            killer:true
        }).show();


@endif
@if(session('deleted'))

        new Noty({
            type: 'error',
            layout: 'bottomRight',
            text: "{{ session('deleted') }}",
            timeout:3000,
            killer:true
        }).show();


@endif

</script>
