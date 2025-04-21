{{-- @extends('dashboard.layouts.app')

@section('content')

    <nav aria-label="breadcrumb" class="p-3 mb-3 rounded-1 d-flex justify-content-between "
        style="background: #d3d3d3 !important;">
        <h2 style="margin: 0 !important;">Permissions</h2>
        <ol class="breadcrumb d-flex align-items-center" style="margin: 0 !important;">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Permissions</li>

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
                        </div>end of col --}}

                        {{-- <div class="col-md-4 ">

                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                            <a href="{{ route('permissions.create') }}" class="btn btn-outline-success"><i
                                    class="bi bi-plus-square"></i> Add</i>
                            </a>
                        </div> --}}
                        {{-- end of col --}}

                    {{-- </div>end of row --}}
                {{-- </form>end of form --}}

            {{-- </div>{{-- end of col 12 --}}
        {{-- </div>end of Head row --}}
{{--
        <div class="row">
            <div class="col-md-12">
                @if ($permissions->count() > 0)
                    <table class="table  table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $index => $permission)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $permission->name }}
                                    </td>
                                    <td>
                                        <a href="{{ route('permissions.edit', $permission->id) }} " class=" btn btn-warning btn-sm"><i
                                                class="bi bi-pencil-square"></i> Edit</a>

                                        <form method="post" action="{{ route('permissions.destroy', $permission->id) }}"
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
                    {{ $permissions->appends(request()->query())->links() }}
                @else
                    <h3 style="text-align: center" class="mt-3 ">
                        @if (request()->search)
                            Sorry no Permissions like this
                        @else
                            Sorry no data found
                        @endif
                    </h3>
                @endif
            </div>
        </div>
    </div>

@endsection --}}


@extends('dashboard.layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <!-- Role Table -->
            <div class="card">
                <div class="card-datatable">
                    <div id="DataTables_Table_0_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                        <div class="row m-3 justify-content-between">

                            <div class="col-12 ">

                                <form action="">
                                    <div class="row">

                                        <div class="col-md-4 mb-2">
                                            <div class="form-group">
                                                <input type="text" name="search" value="{{ request()->search }}"
                                                    placeholder="search" autofocus class="form-control">
                                            </div>
                                        </div>{{-- end of col --}}

                                        <div class="col-md-4  ">

                                            <button type="submit" class="btn btn-primary "><i class="bx bx-search"></i>
                                                Search</button>
                                            <a href="#" class="btn btn-outline-success"
                                                data-bs-target="#addpermissionModal" data-bs-toggle="modal"><i
                                                    class="bx bx-plus"></i> Add</i>
                                            </a>
                                        </div>{{-- end of col --}}

                                    </div>{{-- end of row --}}
                                </form>{{-- end of form --}}

                            </div>{{-- end of col 12 --}}
                        </div>{{-- end of Head row --}}
                        <div class="justify-content-between dt-layouts'dashboard.layouts.app'-table">
                            <div class="d-md-flex justify-content-between align-items-center col-12 dt-layouts'dashboard.layouts.app'-full col-md">
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
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Created_at</span>
                                            </th>

                                            <th data-dt-column="7" rowspan="1" colspan="1" class="dt-orderable-none"
                                                aria-label="Actions"><span class="dt-column-title">Actions</span></th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body">
                                        @foreach ($permissions as $index => $permission)
                                            <tr id="{{ $permission->id }}">
                                                <td>{{ $index + 1 }}</td>

                                                <td class="text-heading" id="{{ $permission->id }}-name">
                                                    <span class="fw-medium">{{ $permission->name }}</span>
                                                </td>



                                                <td>{{ $permission->created_at }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="#" data-bs-target="#editpermissionModal"
                                                            onclick="showEditModalpermission('{{ route('admin.permissions.show', $permission->id) }}', '{{ route('permissions.update', $permission->id) }}')"
                                                            data-bs-toggle="modal" class="btn-sm btn-icon text-warning "><i
                                                                class="icon-base bx bx-edit-alt icon-md"></i></a>

                                                        <form method="post"
                                                            action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                            style="display: inline-block;">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn-sm  btn-icon text-danger "><i
                                                                    class="icon-base bx bx-trash icon-md"></i> </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row mx-3 justify-content-between" style="margin-top: 1rem;">
                            @if ($permissions->count() > 0)
                                {{ $permissions->appends(request()->query())->links() }}
                            @else
                                <h3 class="mt-3 text-center ">
                                    @if (request()->search)
                                        Sorry no permission like this
                                    @else
                                        Sorry no data found
                                    @endif
                                </h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Role Table -->
        </div>
    </div>
    {{-- add modal --}}
    <div class="modal fade" id="addpermissionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Add new permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Add role form -->
                    <form id="addpermissionForm" class="row mt-3 g-6" onsubmit="return false"
                        action="{{ route('admin.permissions.store') }}">
                        @csrf
                        {{-- Full input  --}}
                        <div class="row ">
                            <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Name</label>
                                <input type="text" id="nameLarge" class="form-control" placeholder="Enter Name"
                                    name="name">
                            </div>
                        </div>{{-- end of Full input --}}
                        {{-- half input --}}
                        <div class="row mt-1 g-9 " style="padding-right: 0 !important;">
                            <div class="col mb-0 mt-0">
                                <label for="priceLarge" class="form-label">price</label>
                                <input type="number" id="priceLarge" class="form-control" placeholder="50"
                                    name="price">
                            </div>
                            <div class="col mb-0 mt-0 ">
                                <label for="PD" class="form-label">Product Numbers</label>
                                <input type="number" id="PD" class="form-control" name="product_numbers">
                            </div>
                        </div>
                        <div class="row mt-1 g-9 " style="padding-right: 0 !important;">
                            <div class="col mb-0 mt-0">
                                <label for="PeriodLarge" class="form-label">Period</label>
                                <input type="number" id="emailLarge" class="form-control"
                                    placeholder="number of Months" name="Period">
                            </div>

                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success me-sm-3 me-1"><i class="bx bx-plus"></i>
                                Save</button>
                            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>
    {{-- edit modal --}}
    <div class="modal fade" id="editpermissionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Add new permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- edit role form -->
                    <form id="editpermissionForm" class="row mt-3 g-6" data-url="" onsubmit="return false">
                        {{-- Full input  --}}
                        <div class="row ">
                            <div class="col mb-3">
                                <label for="nameLarge" class="form-label">Name</label>
                                <input type="text" id="nameLarge" class="form-control" placeholder="Enter Name"
                                    name="name">
                            </div>
                        </div>{{-- end of Full input --}}
                        {{-- half input --}}
                        <div class="row mt-1 g-9 " style="padding-right: 0 !important;">
                            <div class="col mb-0 mt-0">
                                <label for="priceLarge" class="form-label">price</label>
                                <input type="number" id="priceLarge" class="form-control" placeholder="50"
                                    name="price">
                            </div>
                            <div class="col mb-0 mt-0 ">
                                <label for="PD" class="form-label">Product Numbers</label>
                                <input type="number" id="PD" class="form-control" name="product_numbers">
                            </div>
                        </div>
                        <div class="row mt-1 g-9 " style="padding-right: 0 !important;">
                            <div class="col mb-0 mt-0">
                                <label for="PeriodLarge" class="form-label">Period</label>
                                <input type="number" id="emailLarge" class="form-control" placeholder="6"
                                    name="period">
                            </div>

                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-warning me-sm-3 me-1">Edit</button>
                            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>

@endsection
