@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        @foreach ($errors->all() as $error)
            <p class="mb-0">{{ $error }}</p>


        @endforeach
    </div>
@endif

