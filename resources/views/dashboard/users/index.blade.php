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
                                                {{ __('dashboard/table.search') }}
                                            </button>
                                            <a href="{{ route('admin.users.create') }}" class="btn btn-outline-success"
                                                data-bs-target="#adduserModal" data-bs-toggle="modal"><i
                                                    class="ti ti-plus"></i> {{ __('dashboard/table.add') }}</i>
                                            </a>
                                        </div>{{-- end of col --}}

                                    </div>{{-- end of row --}}
                                </form>{{-- end of form --}}

                            </div>{{-- end of col 12 --}}
                        </div>{{-- end of Head row --}}
                        <div class="justify-content-between dt-layouts'dashboard.layouts.app'-table">
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
                                                    class="dt-column-title"> {{ __('dashboard/table.name') }}</span>
                                            </th>
                                            <th data-dt-column="2" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title"> {{ __('dashboard/table.email') }}</span>
                                            </th>
                                            <th data-dt-column="2" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title"> {{ __('dashboard/table.status') }}</span>
                                            </th>

                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title"> {{ __('dashboard/table.created_at') }}</span>
                                            </th>

                                            <th data-dt-column="7" rowspan="1" colspan="1" class="dt-orderable-none"
                                                aria-label="Actions"><span class="dt-column-title"> {{ __('dashboard/table.actions') }}</span></th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body">
                                        @foreach ($users as $index => $user)
                                            <tr id="{{ $user->id }}">
                                                <td>{{ $index + 1 }}</td>

                                                <td class="text-heading" id="{{ $user->id }}-name">
                                                    <span class="fw-medium">{{ $user->name }}</span>
                                                </td>
                                                <td class="text-heading" id="{{ $user->id }}-name">
                                                    <span class="fw-medium">{{ $user->email }}</span>
                                                </td>
                                                <td id="{{ $user->id }}-status"><span
                                                        class="badge bg-label-{{ $user->status == App\Models\User::STATUS_ACTIVE ? 'success' : 'danger' }}"
                                                        text-capitalized="">{{ $user->status }}</span>
                                                </td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                                            class="btn-sm btn-icon text-warning "><i
                                                                class="icon-base ti ti-edit icon-md"></i></a>

                                                        <form method="post"
                                                            action="{{ route('admin.users.destroy', $user->id) }}"
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
                            @if ($users->count() > 0)
                                {{ $users->appends(request()->query())->links() }}
                            @else
                                <h3 class="mt-3 text-center ">
                                    @if (request()->search)
                                    {{ __('dashboard/table.Sorry no user like this') }}
                                    @else
                                    {{ __('dashboard/table.no_data_found') }}
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
