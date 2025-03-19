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
                                                data-bs-target="#addPlaneModal" data-bs-toggle="modal"><i
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
                                            <tr id="{{ $plane->id }}">
                                                <td>{{ $index + 1 }}</td>
                                                <td class="text-heading" id="{{ $plane->id }}-name">
                                                    <span class="fw-medium">{{ $plane->name }}</span>
                                                </td>

                                                <td>
                                                    <span class="text-truncate d-flex align-items-center text-heading"><i
                                                            class="icon-base bx bx-dollar text-success me-2"></i><span
                                                            id="{{ $plane->id }}-price">{{ $plane->price }}</span></span>
                                                </td>
                                                <td><span class="fw-medium"
                                                        id="{{ $plane->id }}-product_numbers">{{ $plane->product_numbers }}</span>
                                                </td>
                                                <td><span id="{{ $plane->id }}-period">{{ $plane->period }}</span> Month
                                                </td>
                                                <td id="{{ $plane->id }}-status"><span
                                                        class="badge bg-label-{{ $plane->status == App\Models\Dashboard\Plane::STATUS_ACTIVE ? 'success' : 'danger' }}"
                                                        text-capitalized="">{{ $plane->status }}</span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="#" data-bs-target="#editPlaneModal"
                                                            onclick="showEditModalPlane('{{ route('planes.show', $plane->id) }}', '{{ route('planes.update', $plane->id) }}')"
                                                            data-bs-toggle="modal" class="btn-sm btn-icon text-warning "><i
                                                                class="icon-base bx bx-edit-alt icon-md"></i></a>

                                                        <form method="post"
                                                            action="{{ route('planes.destroy', $plane->id) }}"
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
                            @if ($planes->count() > 0)
                                {{ $planes->appends(request()->query())->links() }}
                            @else
                                <h3 class="mt-3 text-center ">
                                    @if (request()->search)
                                        Sorry no plane like this
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
    <div class="modal fade" id="addPlaneModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Add new Plane</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Add role form -->
                    <form id="addRoleForm" class="row mt-3 g-6" onsubmit="return false">
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
                                    name="Period">
                            </div>
                            <div class="col mb-0 mt-0 d-flex align-items-end ">
                                <div class="form-check form-check-success">
                                    <input class="form-check-input" type="checkbox" id="customCheckSuccess"
                                        checked="" name="status"
                                        value="{{ App\Models\Dashboard\Plane::STATUS_ACTIVE }}">
                                    <label class="form-check-label" for="customCheckSuccess">Active</label>
                                </div>
                            </div>
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
    {{-- edit modal --}}
    <div class="modal fade" id="editPlaneModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Add new Plane</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Add role form -->
                    <form id="editPlaneForm" class="row mt-3 g-6" data-url="" onsubmit="return false">
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
                            <div class="col mb-0 mt-0 d-flex align-items-end ">
                                <div class="form-check form-check-success">
                                    <input class="form-check-input" type="checkbox" id="customCheckSuccess"
                                        checked="" name="status"
                                        value="{{ App\Models\Dashboard\Plane::STATUS_ACTIVE }}">
                                    <label class="form-check-label" for="customCheckSuccess">Active</label>
                                </div>
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
    @push('scripts')
        <script>
            function showEditModalPlane(plane, update_url) {


                $.ajax({
                    url: plane, // Use the URL of the update route
                    method: 'GET', // Use GET to fetch the current data
                    success: function(response) {
                        // Assuming the response contains the updated plane data
                        const plane = response.data;

                        document.querySelector('#editPlaneForm input[name="name"]').value = plane.name;
                        document.querySelector('#editPlaneForm input[name="price"]').value = plane.price;
                        document.querySelector('#editPlaneForm input[name="product_numbers"]').value = plane
                            .product_numbers;
                        document.querySelector('#editPlaneForm input[name="period"]').value = plane.period;
                        document.querySelector('#editPlaneForm input[name="status"]').checked = plane.status ===
                            '{{ App\Models\Dashboard\Plane::STATUS_ACTIVE }}';
                        document.querySelector('#editPlaneForm').setAttribute('data-url', update_url);
                    }
                });





            }

            $(document).ready(function() {
                $('#editPlaneForm').on('submit', function(e) {
                    e.preventDefault(); // Prevent the default form submission

                    const formData = new FormData(this); // Create FormData object from the form
                    const url = $(this).data('url'); // Define the route

                    $.ajax({
                        url: url,
                        data: formData,
                        method: "POST",
                        processData: false, // Prevent jQuery from converting the data
                        contentType: false, // Prevent jQuery from setting the content type
                        headers: {
                            "X-HTTP-Method-Override": "PUT"
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#editPlaneModal').modal('hide'); // Close the modal
                                Swal.fire({
                                    icon: "success",
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                const row = $("#" + response.data.id);
                                row.find(`#${response.data.id}-name`).text(response.data.name);
                                row.find(`#${response.data.id}-price`).text(response.data.price);
                                row.find(`#${response.data.id}-product_numbers`).text(response.data
                                    .product_numbers);
                                row.find(`#${response.data.id}-period`).text(response.data.period);
                                row.find(`#${response.data.id}-status`).html(
                                    `<span class="badge bg-label-${response.data.status == 'active' ? 'success' : 'danger'}" text-capitalized="">${response.data.status}</span>`
                                );

                            }
                        },
                        error: function(xhr) {
                            let errors = xhr.responseJSON.errors;
                            let errorMessage = "An error occurred:\n";
                            $.each(errors, function(key, value) {
                                errorMessage += value[0] +
                                    "\n"; // Append each error message
                            });
                            alert(errorMessage); // Show error messages
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
