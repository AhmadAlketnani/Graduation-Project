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

                                            <button type="submit" class="btn btn-primary "><i class="ti ti-search"></i>
                                                Search</button>
                                            <a href="{{ route('admin.stores.create') }}" class="btn btn-outline-success"
                                                data-bs-target="#addstoreModal" data-bs-toggle="modal"><i
                                                class="ti ti-plus"></i> Add</i>
                                            </a>
                                        </div>{{-- end of col --}}

                                    </div>{{-- end of row --}}
                                </form>{{-- end of form --}}

                            </div>{{-- end of col 12 --}}
                        </div>{{-- end of Head row --}}
                        <div class="justify-content-between dt-layouts'dashboard.layouts.app'-table table-responsive">
                            <div
                                class="d-md-flex justify-content-between align-items-center col-12 dt-layouts'dashboard.layouts.app'-full col-md">
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
                                                    class="dt-column-title">Email</span>
                                            </th>
                                            <th data-dt-column="4" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Phone</span>
                                            </th>
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Location</span>
                                            </th>
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Social Media</span>
                                            </th>

                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">User</span>
                                            </th>
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Created_at</span>
                                            </th>

                                            <th data-dt-column="7" rowspan="1" colspan="1" class="dt-orderable-none"
                                                aria-label="Actions"><span class="dt-column-title">Actions</span></th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body">
                                        @foreach ($stores as $index => $store)
                                            <tr id="{{ $store->id }}">
                                                <td>{{ $index + 1 }}</td>
                                                <td class="text-heading" id="{{ $store->id }}-name">
                                                    <span class="fw-medium">{{ $store->name }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-truncate d-flex align-items-center text-heading"><i
                                                            class="icon-base bx bx-dollar text-success me-2"></i><span
                                                            id="{{ $store->id }}-email">{{ $store->email }}</span></span>
                                                </td>
                                                <td><span class="fw-medium"
                                                        id="{{ $store->id }}-phone">{{ $store->phone }}</span>
                                                </td>
                                                <td><span id="{{ $store->id }}-location">{{ $store->location }}</span>
                                                </td>
                                                <td>
                                                    {{-- Facebook --}}

                                                    <a href="{{ $store->facebook }}" target="_blank">
                                                        <i class="ti ti-brand-facebook" title="Facebook"></i>
                                                    </a>
                                                    {{-- Instagram --}}
                                                    <a href="{{ $store->instagram }}" target="_blank">
                                                        <i class="ti ti-brand-instagram" title="Instagram"></i>
                                                    </a>

                                                </td>
                                                <td>{{ $store->user->name }}</td>
                                                <td>{{ $store->created_at }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="{{ route('admin.stores.edit', $store->id) }}"
                                                            class="btn-sm btn-icon text-warning "><i
                                                                class="icon-base ti ti-edit icon-md"></i></a>

                                                        <form method="post"
                                                            action="{{ route('admin.stores.destroy', $store->id) }}"
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
                            @if ($stores->count() > 0)
                                {{ $stores->appends(request()->query())->links() }}
                            @else
                                <h3 class="mt-3 text-center ">
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
            </div>
            <!--/ Role Table -->
        </div>
    </div>


@endsection
