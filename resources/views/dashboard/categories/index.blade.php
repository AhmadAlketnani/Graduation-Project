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
                                                data-bs-target="#addCategoryModal" data-bs-toggle="modal"><i
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
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Image</span>
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
                                        @foreach ($categories as $index => $category)
                                            <tr id="{{ $category->id }}">
                                                <td>{{ $index + 1 }}</td>
                                                <td>
                                                    <img class="img-thumbnail" src="{{ $category->image }}" alt=""
                                                        style="width: 50px; height: 50px;" loading="lazy"
                                                        onmouseover="showZoomedImage('{{ $category->image }}')"
                                                        onmouseout="hideZoomedImage()">
                                                </td>
                                                <td class="text-heading" id="{{ $category->id }}-name">
                                                    <span class="fw-medium">{{ $category->name }}</span>
                                                </td>



                                                <td>{{ $category->created_at }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="#" data-bs-target="#editCategoryModal"
                                                            onclick="showEditModalCategory('{{ route('categories.show', $category->id) }}', '{{ route('categories.update', $category->id) }}')"
                                                            data-bs-toggle="modal" class="btn-sm btn-icon text-warning "><i
                                                                class="icon-base bx bx-edit-alt icon-md"></i></a>

                                                        <form method="post"
                                                            action="{{ route('categories.destroy', $category->id) }}"
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
                            @if ($categories->count() > 0)
                                {{ $categories->appends(request()->query())->links() }}
                            @else
                                <h3 class="mt-3 text-center ">
                                    @if (request()->search)
                                        Sorry no category like this
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
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Add new category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Add role form -->
                    <form id="addCategoryForm" class="row mt-3 g-6" onsubmit="return false"
                        action="{{ route('categories.store') }}">
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
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Add new Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- edit role form -->
                    <form id="editCategoryForm" class="row mt-3 g-6" data-url="" onsubmit="return false">
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
    @push('scripts')
        <script>
            // Show the edit modal with the current data
            function showEditModalCategory(category, update_url) {
                $.ajax({
                    url: category, // Use the URL of the update route
                    method: 'GET', // Use GET to fetch the current data
                    success: function(response) {
                        // Assuming the response contains the updated category data
                        const category = response.data;

                        document.querySelector('#editCategoryForm input[name="name"]').value = category.name;
                        document.querySelector('#editCategoryForm input[name="price"]').value = category.price;
                        document.querySelector('#editCategoryForm input[name="product_numbers"]').value = category
                            .product_numbers;
                        document.querySelector('#editCategoryForm input[name="period"]').value = category.period;
                        document.querySelector('#editCategoryForm').setAttribute('data-url', update_url);
                    }
                });
            }

            
            //edit modal handeling
            // $(document).ready(function() {
            //     $('#editCategoryForm').on('submit', function(e) {
            //         e.preventDefault(); // Prevent the default form submission

            //         const formData = new FormData(this); // Create FormData object from the form
            //         const url = $(this).data('url'); // Define the route

            //         $.ajax({
            //             url: url,
            //             data: formData,
            //             method: "POST",
            //             processData: false, // Prevent jQuery from converting the data
            //             contentType: false, // Prevent jQuery from setting the content type
            //             headers: {
            //                 "X-HTTP-Method-Override": "PUT"
            //             },
            //             success: function(response) {
            //                 if (response.success) {
            //                     $('#editCategoryModal').modal('hide'); // Close the modal
            //                     Swal.fire({
            //                         icon: "success",
            //                         title: response.message,
            //                         showConfirmButton: false,
            //                         timer: 1500
            //                     });
            //                     const row = $("#" + response.data.id);
            //                     row.find(`#${response.data.id}-name`).text(response.data.name);
            //                     row.find(`#${response.data.id}-price`).text(response.data.price);
            //                     row.find(`#${response.data.id}-product_numbers`).text(response.data
            //                         .product_numbers);
            //                     row.find(`#${response.data.id}-period`).text(response.data.period);
            //                     row.find(`#${response.data.id}-status`).html(
            //                         `<span class="badge bg-label-${response.data.status == 'active' ? 'success' : 'danger'}" text-capitalized="">${response.data.status}</span>`
            //                     );

            //                 }
            //             },
            //             error: function(xhr) {
            //                 let errors = xhr.responseJSON.errors;
            //                 let errorMessage = "An error occurred:\n";
            //                 $.each(errors, function(key, value) {
            //                     errorMessage += value[0] +
            //                         "\n"; // Append each error message
            //                 });
            //                 alert(errorMessage); // Show error messages
            //             }
            //         });
            //     });
            // });
        </script>
    @endpush
@endsection
