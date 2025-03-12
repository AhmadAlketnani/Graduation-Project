@extends('dashboard.layout.app')

@section('content')
    <nav aria-label="breadcrumb" class="p-3 mb-3 rounded-1 d-flex justify-content-between "
        style="background: #d3d3d3 !important;">
        <h2 style="margin: 0 !important;">Roles</h2>
        <ol class="breadcrumb d-flex align-items-center" style="margin: 0 !important;">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('roles.index') }}">Roles</a></li>
            <li class="breadcrumb-item active">Edit Role</li>

        </ol>
    </nav>

    <div class="tile mb-4">
        <div class="row">


            <form method="post" action="{{ route('roles.update', $role->id) }}">
                @csrf
                @method('put')
                @include('dashboard.includes._errors')
                <div class="form-group mb-3">

                    <label class="form-label">Name</label>
                    <input class="form-control" type="text" placeholder="page Name"
                        value="{{ old('name', $role->name) }}" name="name">
                </div>
                <div class="form-group">
                    <button class="btn btn-warning" type="submit"><i class="bi bi-pencil-square"></i> Edit</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-danger"><i class="bi bi-ban"></i> Cancel
                    </a>
                </div>

            </form>

        </div>{{-- end of row --}}
    </div>{{-- end of tile --}}
@endsection
