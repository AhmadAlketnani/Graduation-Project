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
                                                {{ __('dashboard/table.search') }}</button>

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
                                                    class="dt-column-title">{{ __('dashboard/table.name') }}</span>
                                            </th>
                                            <th data-dt-column="2" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">{{ __('dashboard/table.email') }}</span>
                                            </th>
                                            <th data-dt-column="2" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">{{ __('dashboard/table.status') }}</span>
                                            </th>

                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">{{ __('dashboard/table.ordered_at') }}</span>
                                            </th>

                                            <th data-dt-column="7" rowspan="1" colspan="1" class="dt-orderable-none"
                                                aria-label="Actions"><span class="dt-column-title">{{ __('dashboard/table.actions') }}</span></th>
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
                                                <td id="status-{{ $user->id }}">
                                                    {{-- <div class="form-check form-switch">
                                                        <input
                                                            class="form-check-input status-checkbox {{ $user->status === 'active' ? 'bg-success' : '' }}"
                                                            type="checkbox" data-user-id="{{ $user->id }}"
                                                            {{ $user->status === 'active' ? 'checked' : '' }}>
                                                        <label class="form-check-label ms-2">

                                                        </label>
                                                    </div> --}}
                                                    {{ ucfirst($user->status) }}
                                                </td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <div class="btn btn-success"
                                                            data-url="{{ route('admin.orders.accept', $user->id) }}">
                                                            <i class="icon-base ti ti-circle-check icon-md mr-1"></i>
                                                            {{ __('dashboard/table.accept') }}
                                                        </div>
                                                        <div class="btn btn-outline-danger"
                                                            data-url="{{ route('admin.orders.reject', $user->id) }}">
                                                            <i class="icon-base ti ti-circle-x icon-md mr-1"></i>
                                                            {{ __('dashboard/table.reject') }}
                                                        </div>

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
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Handle the click event for the accept button
                document.querySelectorAll('.btn-success').forEach(function(button) {
                    button.addEventListener('click', function() {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You want to accept user request!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#71dd37',
                            cancelButtonColor: '#ff3e1d',
                            confirmButtonText: 'Yes, accept it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.showLoading()
                                const userId = this.closest('tr').id;
                                $.ajax({
                                    url: $(this).data('url'),
                                    method: 'POST',
                                    success: function(response) {
                                        Swal.hideLoading();
                                        Swal.fire({
                                            icon: response.status,
                                            title: response.title,
                                            text: response.message,
                                            confirmButtonColor: '#71dd37',
                                            confirmButtonText: 'OK'
                                        }).then(() => {
                                            // Optionally, update the UI or remove the row
                                            $(`#${userId}`).remove();
                                        });
                                    },
                                    error: function(xhr) {
                                        Swal.hideLoading();
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: 'An error occurred while accepting the order.',
                                            confirmButtonColor: '#71dd37',
                                            confirmButtonText: 'OK'
                                        });
                                        console.error(xhr.responseText);
                                    }
                                });
                            }
                        });
                    });
                });
                // Handle the click event for the reject button
                document.querySelectorAll('.btn-outline-danger').forEach(function(button) {
                    button.addEventListener('click', function() {

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You want to reject user request!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#71dd37',
                            cancelButtonColor: '#ff3e1d',
                            confirmButtonText: 'Yes, reject it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.showLoading();
                                const userId = this.closest('tr').id;
                                $.ajax({
                                    url: $(this).data('url'),
                                    method: 'POST',
                                    headers: {
                                        // over write http method to delete
                                        'X-HTTP-Method-Override': 'DELETE',
                                    },
                                    success: function(response) {
                                        Swal.hideLoading();
                                        Swal.fire({
                                            icon: response.status,
                                            title: response.title,
                                            text: response.message,
                                            confirmButtonColor: '#71dd37',
                                            confirmButtonText: 'OK'
                                        }).then(() => {
                                            // Optionally, update the UI or remove the row
                                            $(`#${userId}`).remove();
                                        });
                                    },
                                    error: function(xhr) {
                                        Swal.hideLoading();
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: 'An error occurred while rejecting the order.',
                                            confirmButtonColor: '#71dd37',
                                            confirmButtonText: 'OK'
                                        });
                                        console.error(xhr.responseText);
                                    }
                                });
                            }
                        });
                    });
                });
            });
        </script>
    @endpush
@endsection
