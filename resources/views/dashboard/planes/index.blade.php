@extends('dashboard.layout.app')

@section('content')
    {{-- <nav aria-label="breadcrumb" class="p-3 mb-3 rounded-1 d-flex justify-content-between "
        style="background: #d3d3d3 !important;">
        <h2 style="margin: 0 !important;">Permissions</h2>
        <ol class="breadcrumb d-flex align-items-center" style="margin: 0 !important;">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Permissions</li>

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
                                    <colgroup>
                                        <col data-dt-column="1" style="width: 67.1375px;">
                                        <col data-dt-column="2" style="width: 334.1px;">
                                        <col data-dt-column="3" style="width: 165.062px;">
                                        <col data-dt-column="4" style="width: 130.538px;">
                                        <col data-dt-column="5" style="width: 209.038px;">
                                        <col data-dt-column="6" style="width: 124.613px;">
                                        <col data-dt-column="7" style="width: 178.312px;">
                                    </colgroup>
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
                                    <tbody>
                                        @foreach ($planes as $index => $plane)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td class="text-heading">
                                                <span class="fw-medium">{{ $plane->name }}</span>
                                            </td>

                                            <td>
                                                <span class="text-truncate d-flex align-items-center text-heading"><i
                                                        class="icon-base bx bx-dollar text-success me-2"></i>{{ $plane->price }}</span>
                                            </td>
                                            <td><span class="fw-medium">{{ $plane->product_numbers }}</span></td>
                                            <td>{{ $plane->period }} Month</td>
                                            <td><span class="badge bg-label-success" text-capitalized="">Active</span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-2">
                                                    <a href="{{ route('planes.edit', $plane->id) }}" class="btn-sm btn-icon text-warning "><i
                                                            class="icon-base bx bx-edit-alt icon-md"></i></a>

                                                            <form method="post" action="{{ route('planes.destroy', $plane->id) }}"
                                                                style="display: inline-block;">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn-sm  btn-icon text-danger "><i
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
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row mx-3 justify-content-between">
                            <div
                                class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto me-auto ps-2 mt-0">
                                <div class="dt-info" aria-live="polite" id="DataTables_Table_0_info" role="status">
                                    Showing 1 to 10 of 50 entries<span class="select-info"><span class="select-item">50
                                            rows selected</span><span class="select-item"></span><span
                                            class="select-item"></span></span></div>
                            </div>
                            <div
                                class="d-md-flex align-items-center dt-layout-end col-md-auto ms-auto justify-content-md-between justify-content-center d-flex flex-wrap gap-4 mb-sm-0 mb-4 mt-0">
                                <div class="dt-paging">
                                    <nav aria-label="pagination">
                                        <ul class="pagination">
                                            <li class="dt-paging-button page-item disabled"><button
                                                    class="page-link previous" role="link" type="button"
                                                    aria-controls="DataTables_Table_0" aria-disabled="true"
                                                    aria-label="Previous" data-dt-idx="previous" tabindex="-1"><i
                                                        class="icon-base bx bx-chevron-left scaleX-n1-rtl icon-18px"></i></button>
                                            </li>
                                            <li class="dt-paging-button page-item active"><button class="page-link"
                                                    role="link" type="button" aria-controls="DataTables_Table_0"
                                                    aria-current="page" data-dt-idx="0">1</button></li>
                                            <li class="dt-paging-button page-item"><button class="page-link"
                                                    role="link" type="button" aria-controls="DataTables_Table_0"
                                                    data-dt-idx="1">2</button></li>
                                            <li class="dt-paging-button page-item"><button class="page-link"
                                                    role="link" type="button" aria-controls="DataTables_Table_0"
                                                    data-dt-idx="2">3</button></li>
                                            <li class="dt-paging-button page-item"><button class="page-link"
                                                    role="link" type="button" aria-controls="DataTables_Table_0"
                                                    data-dt-idx="3">4</button></li>
                                            <li class="dt-paging-button page-item"><button class="page-link"
                                                    role="link" type="button" aria-controls="DataTables_Table_0"
                                                    data-dt-idx="4">5</button></li>
                                            <li class="dt-paging-button page-item"><button class="page-link next"
                                                    role="link" type="button" aria-controls="DataTables_Table_0"
                                                    aria-label="Next" data-dt-idx="next"><i
                                                        class="icon-base bx bx-chevron-right scaleX-n1-rtl icon-18px"></i></button>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Role Table -->
        </div>
    </div>
@endsection
