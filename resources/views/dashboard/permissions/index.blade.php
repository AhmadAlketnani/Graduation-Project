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
                                            <a href="{{ route("admin.permissions.create") }}" class="btn btn-outline-success"
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
                                                        <a href="#" data-bs-target="#editProductModal"
                                                            onclick="showEditModalProduct('{{ route('admin.permissions.edit', $permission->id) }}', '{{ route('admin.permissions.update', $permission->id) }}')"
                                                            data-bs-toggle="modal"
                                                            class="btn-sm btn-icon text-warning "><i
                                                                class="icon-base ti ti-edit icon-md"></i></a>

                                                        <form method="post"
                                                            action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                            style="display: inline-block;">
                                                            @csrf
                                                            @method('delete')

                                                            {{-- <a href="javascript:;" class="btn btn-icon delete-record">
                                                                <i class="icon-base bx bx-trash icon-md"></i></a> --}}

                                                            <button type="submit"
                                                                class=" btn btn-icon text-danger rounded-circle delete">
                                                                {{-- class=" btn btn-sm btn-icon text-danger rounded-circle delete"> --}}
                                                                <i class="icon-base ti ti-trash icon-md"></i> </button>
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



@endsection
