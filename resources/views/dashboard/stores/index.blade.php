@extends('dashboard.layout.app')

@section('content')

    <nav aria-label="breadcrumb" class="p-3 mb-3 rounded-1 d-flex justify-content-between "
        style="background: #d3d3d3 !important;">
        <h2 style="margin: 0 !important;">Stores</h2>
        <ol class="breadcrumb d-flex align-items-center" style="margin: 0 !important;">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Stores</li>

        </ol>
    </nav>

    <div class="tile mb-4">
        <div class="row">

            <div class="col-12">

                <form action="">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="search" value="{{ request()->search }}"
                                    placeholder="search" autofocus class="form-control">
                            </div>
                        </div>{{-- end of col --}}

                        <div class="col-md-4 ">

                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                            <a href="{{ route('stores.create') }}" class="btn btn-outline-success"><i
                                    class="bi bi-plus-square"></i> Add</i>
                            </a>
                        </div>{{-- end of col --}}

                    </div>{{-- end of row --}}
                </form>{{-- end of form --}}

            </div>{{-- end of col 12 --}}
        </div>{{-- end of Head row --}}

        <div class="row">
            <div class="col-md-12">
                @if ($stores->count() > 0)
                    <table class="table  table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Facebook</th>
                                <th>Instagram</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $index => $store)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $store->name }}
                                    </td>
                                    <td>
                                        {{ $store->email }}
                                    </td>
                                    <td>
                                        {{ $store->phone }}
                                    </td>
                                    <td>
                                        {{ $store->location }}
                                    </td>
                                    <td>
                                        {{ $store->facebook }}
                                    </td>
                                    <td>
                                        {{ $store->instagram }}
                                    </td>
                                    <td>
                                        <a href="{{ route('stores.edit', $store->id) }} " class=" btn btn-warning btn-sm"><i
                                                class="bi bi-pencil-square"></i> Edit</a>

                                        <form method="post" action="{{ route('stores.destroy', $store->id) }}"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm delete"><i
                                                    class="bi bi-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $stores->appends(request()->query())->links() }}
                @else
                    <h3 style="text-align: center" class="mt-3 ">
                        @if (request()->search)
                            Sorry no store like this
                        @else
                            Sorry no data found
                        @endif
                    </h3>
                @endif
            </div>
        </div>
    </div>

@endsection
