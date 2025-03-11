@extends('dashboard.layout.app')

@section('content')
    <nav aria-label="breadcrumb" class="p-3 mb-3 rounded-1 d-flex justify-content-between "
        style="background: #d3d3d3 !important;">
        <h2 style="margin: 0 !important;">Stores</h2>
        <ol class="breadcrumb d-flex align-items-center" style="margin: 0 !important;">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('stores.index') }}">Stores</a></li>
            <li class="breadcrumb-item active">Edit Store</li>

        </ol>
    </nav>

    <div class="tile mb-4">
        <div class="row">


            <form method="post" action="{{ route('Stores.update', $store->id) }}">
                @csrf
                @method('put')
                @include('dashboard.includes._errors')
                <div class="form-group mb-3">
                    <label class="form-label">Name</label>
                    <input class="form-control" type="text" placeholder="Page Name"
                        value="{{ old('name', $store->name) }}" name="name">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" placeholder="Store Email"
                        value="{{ old('email', $store->email) }}" name="email">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Phone</label>
                    <input class="form-control" type="tel" placeholder="Store Phone"
                        value="{{ old('phone', $store->phone) }}" name="phone">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Location</label>
                    <input class="form-control" type="text" placeholder="Gaza , omar almkhtar"
                        value="{{ old('location', $store->location) }}" name="location">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Facebook</label>
                    <input class="form-control" type="url" placeholder="Facebook URl"
                        value="{{ old('facebook', $store->facebook) }}" name="facebook">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">instagram</label>
                    <input class="form-control" type="url" placeholder="instagram URl"
                        value="{{ old('instagram', $store->instagram) }}" name="instagram">
                </div>
                @if (Auth::user()->role == 'admin')
                    <div class="form-group mb-3">
                        <label class="form-label">Users</label>
                        <select name="user_id" class="form-select">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $store->user_id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="form-group mb-3">

                        <input class="form-control" type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning" type="submit"><i class="bi bi-pencil-square"></i> Edit</button>
                        <a href="{{ route('stores.index') }}" class="btn btn-danger"><i class="bi bi-ban"></i> Cancel
                        </a>
                    </div>

            </form>

        </div>{{-- end of row --}}
    </div>{{-- end of tile --}}
@endsection
