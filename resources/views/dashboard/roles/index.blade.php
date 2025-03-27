@extends('dashboard.layout.app')

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
                                                data-bs-target="#addRoleModal" data-bs-toggle="modal"><i
                                                    class="bx bx-plus"></i> Add</i>
                                            </a>
                                        </div>{{-- end of col --}}

                                    </div>{{-- end of row --}}
                                </form>{{-- end of form --}}

                            </div>{{-- end of col 12 --}}
                        </div>{{-- end of Head row --}}



                        <div class="justify-content-between dt-layout-table">
                            <div class="d-md-flex justify-content-between align-items-center col-12 dt-layout-full col-md">

                                <table class="datatables-users table border-top table-responsive dataTable dtr-column"
                                    id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 100%;">

                                    <thead>
                                        <tr>
                                            <th data-dt-column="0" class="control dt-orderable-none dtr-hidden"
                                                rowspan="1" colspan="1" aria-label="" style="display: none;">
                                                <span class="dt-column-title"></span><span class="dt-column-order"></span>
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
                                                    class="dt-column-title">Product Numbers</span>
                                            </th>
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Period</span>
                                            </th>
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Status</span>
                                            </th>

                                            <th data-dt-column="7" rowspan="1" colspan="1" class="dt-orderable-none"
                                                aria-label="Actions"><span class="dt-column-title">Actions</span></th>
                                        </tr>
                                    </thead>
                                    @if ($roles->count() > 0)
                                        <tbody>
                                            @foreach ($roles as $index => $plane)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td class="text-heading">
                                                        <span class="fw-medium">{{ $plane->name }}</span>
                                                    </td>

                                                    <td>
                                                        <span
                                                            class="text-truncate d-flex align-items-center text-heading"><i
                                                                class="icon-base bx bx-dollar text-success me-2"></i>{{ $plane->price }}</span>
                                                    </td>
                                                    <td><span class="fw-medium">{{ $plane->product_numbers }}</span></td>
                                                    <td>{{ $plane->period }} Month</td>
                                                    <td><span class="badge bg-label-success"
                                                            text-capitalized="">Active</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <a href="{{ route('roles.edit', $plane->id) }}"
                                                                class="btn-sm btn-icon text-warning "><i
                                                                    class="icon-base bx bx-edit-alt icon-md"></i></a>

                                                            <form method="post"
                                                                action="{{ route('roles.destroy', $plane->id) }}"
                                                                style="display: inline-block;">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    class="btn-sm  btn-icon text-danger "><i
                                                                        class="icon-base bx bx-trash icon-md"></i> </button>
                                                            </form>


                                                            {{--
                                                <a href="javascript:;" class="btn-sm  btn-icon text-danger "><i
                                                        class="icon-base bx bx-trash icon-md"></i></a> --}}

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @endif
                                    <tfoot>

                                    </tfoot>
                                </table>

                            </div>
                        </div>
                        <div class="row mx-3 justify-content-between">
                            @if ($roles->count() > 0)
                                {{ $roles->appends(request()->query())->links() }}
                            @else
                                <h3 class="mt-3 text-center ">
                                    @if (request()->search)
                                        Sorry no role like this
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

    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-6">
                        <h4 class="role-title mb-2">Add New Role</h4>
                        <p>Set role permissions</p>
                    </div>
                    <!-- Add role form -->
                    <form id="addRoleForm" class="row g-6" onsubmit="return false">
                        <div class="col-12 form-control-validation">
                            <label class="form-label" for="modalRoleName">Role Name</label>
                            <input type="text" id="modalRoleName" name="name" class="form-control"
                                placeholder="Enter a role name" tabindex="-1" />
                        </div>
                        <div class="col-12">
                            <h5 class="mb-6">Role Permissions</h5>
                            <!-- Permission table -->
                            <div class="table-responsive">
                                <table class="table table-flush-spacing mb-0 border-top">
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap fw-medium text-heading">Administrator Access <i
                                                    class="icon-base bx bx-info-circle" data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Allows a full access to the system"></i></td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <div class="form-check mb-0">
                                                        <input class="form-check-input" type="checkbox" id="selectAll" />
                                                        <label class="form-check-label" for="selectAll"> Select All
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @foreach ($models as $model )
                                        <tr>
                                            <td class="text-nowrap fw-medium text-heading">User Management</td>

                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <div class="form-check mb-0 me-4 me-lg-12">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="userManagementRead" />
                                                        <label class="form-check-label" for="userManagementRead"> Read
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-0 me-4 me-lg-12">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="userManagementWrite" />
                                                        <label class="form-check-label" for="userManagementWrite"> Write
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-0  me-4 me-lg-12">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="userManagementCreate" />
                                                        <label class="form-check-label" for="userManagementCreate"> Create
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-0">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="userManagementDelete" />
                                                        <label class="form-check-label" for="userManagementDelete"> Delete
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Permission table -->
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success me-sm-3 me-1">Save</button>
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
