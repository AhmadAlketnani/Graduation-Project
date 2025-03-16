@extends('dashboard.layout.app')

@section('content')
{{--
    <nav aria-label="breadcrumb" class="p-3 mb-3 rounded-1 d-flex justify-content-between "
        style="background: #d3d3d3 !important;">
        <h2 style="margin: 0 !important;">Products</h2>
        <ol class="breadcrumb d-flex align-items-center" style="margin: 0 !important;">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Products</li>

        </ol>
    </nav> --}}


    <div class="row">
        <div class="col-12">
            <!-- Role Table -->
            <div class="card">
                <div class="card-datatable">
                    <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                        <div class="row me-3 ms-2 justify-content-between">
                            <div
                                class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto ps-2 mt-0">
                                <div class="dt-length mb-md-6 mb-0"><select name="DataTables_Table_0_length"
                                        aria-controls="DataTables_Table_0" class="form-select" id="dt-length-0">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select><label for="dt-length-0"></label></div>
                            </div>
                            <div
                                class="d-md-flex align-items-center dt-layout-end col-md-auto ms-auto justify-content-md-between justify-content-center d-flex flex-wrap gap-4 mb-sm-0 mb-4 mt-0">
                                <div class="dt-search mb-md-6 mb-2"><input type="search" class="form-control"
                                        id="dt-search-0" placeholder="Search User" aria-controls="DataTables_Table_0"><label
                                        for="dt-search-0"></label></div>
                                <div class="user_role w-px-200 my-md-0 mt-6 mb-2"><select id="UserRole"
                                        class="form-select text-capitalize">
                                        <option value=""> Select Role </option>
                                        <option value="Admin" class="text-capitalize">Admin</option>
                                        <option value="Author" class="text-capitalize">Author</option>
                                        <option value="Editor" class="text-capitalize">Editor</option>
                                        <option value="Maintainer" class="text-capitalize">Maintainer</option>
                                        <option value="Subscriber" class="text-capitalize">Subscriber</option>
                                    </select></div>

                            </div>
                        </div>
                        <div class="justify-content-between dt-layout-table">
                            <div class="d-md-flex justify-content-between align-items-center col-12 dt-layout-full col-md">
                                <table class="datatables-users table border-top table-responsive dataTable dtr-column"
                                    id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 100%;">

                                    <thead>
                                        <tr>
                                            <th data-dt-column="0" class="control dt-orderable-none dtr-hidden"
                                                rowspan="1" colspan="1" aria-label="" style="display: none;"><span
                                                    class="dt-column-title"></span><span class="dt-column-order"></span>
                                            </th>
                                            <th data-dt-column="1" rowspan="1" colspan="1"
                                                class="dt-select dt-orderable-none" aria-label="">#
                                            </th>
                                            <th data-dt-column="2" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Name</span>
                                            </th>
                                            <th data-dt-column="3" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Price</span>
                                            </th>
                                            <th data-dt-column="4" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Images</span>
                                            </th>
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Quantity</span>
                                            </th>
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Description</span>
                                            </th>
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Status</span>
                                            </th>
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Store_id</span>
                                            </th>

                                            <th data-dt-column="7" rowspan="1" colspan="1" class="dt-orderable-none"
                                                aria-label="Actions"><span class="dt-column-title">Actions</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $index => $product)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td class="text-heading">
                                                <span class="fw-medium">{{ $product->name }}</span>
                                            </td>

                                            <td>
                                                <span class="text-truncate d-flex align-items-center text-heading"><i
                                                        class="icon-base bx bx-dollar text-success me-2"></i>{{ $product->price }}</span>
                                            </td>
                                            <td><span class="fw-medium">{{ $product-> }}</span></td>
                                            <td>{{ $plane->period }} Month</td>
                                            <td><span class="badge bg-label-{{ $plane->status == App\Models\Dashboard\Plane::STATUS_ACTIVE ? 'success' : 'danger' }}" text-capitalized="">{{ $plane->status }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <a href="{{ route('planes.edit', $product->id) }}" class="btn-sm btn-icon text-warning "><i
                                                            class="icon-base bx bx-edit-alt icon-md"></i></a>

                                                            <form method="post" action="{{ route('planes.destroy', $product->id) }}"
                                                                style="display: inline-block;">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn-sm  btn-icon text-danger "><i
                                                            class="icon-base bx bx-trash icon-md"></i> </button>
                                                            </form>


{{--


    {{-- <div class="tile mb-4">
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
    {{-- </div> --}}

@endsection
