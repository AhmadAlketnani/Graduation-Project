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
                                            <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-success"
                                                data-bs-target="#addcategoryModal" data-bs-toggle="modal"><i
                                                    class="ti ti-plus"></i> Add</i>
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
                                                    <img class="img-thumbnail" src="{{ $category->image_url }}"
                                                        alt="{{ $category->name }}" style="width: 50px; height: 50px;"
                                                        loading="lazy"
                                                        onmouseover="showZoomedImage('{{ $category->image_url }}')"
                                                        onmouseout="hideZoomedImage()">
                                                </td>
                                                <td class="text-heading" id="{{ $category->id }}-name">
                                                    <span class="fw-medium">{{ $category->name_en }}</span>
                                                </td>
                                                <td>{{ $category->created_at }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                                            class="btn-sm btn-icon text-warning "><i
                                                                class="icon-base ti ti-edit icon-md"></i>
                                                            </a>

                                                        <form method="post"
                                                            action="{{ route('admin.categories.destroy', $category->id) }}"
                                                            style="display: inline-block;">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class=" btn btn-icon text-danger rounded-circle delete">
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
    @push('scripts')
        <script>
            $(document).ready(function() {
                // Handle the click event for the edit button
                $('.btn-edit').on('click', function(e) {
                    e.preventDefault();
                    console.log('welcome');

                    const categoryId = $(this).data('id');

                    // Get the category data from the server
                    $.ajax({
                        url: `{{ route('admin.categories.show', ':id') }}`.replace(':id', categoryId),
                        type: 'GET',
                        success: function(data) {
                            $('#editCategoryForm').attr('data-url',
                                `{{ route('admin.categories.update', ':id') }}`.replace(':id',
                                    categoryId));
                            $('#editCategoryForm input[name="name_en"]').val(data.name_en);
                            $('#editCategoryForm input[name="name_ar"]').val(data.name_ar);
                            $('.image').html(
                                `<img src="${data.image_url}" class="img-thumbnail" style="width: 50px; height: 50px;" alt="Category Image">`
                            );

                            // Show zoomed image on hover
                            $('#editCategoryForm img.img-thumbnail').on('mouseover', function() {
                                showZoomedImage($(this).attr('src'));
                            }).on('mouseout', function() {
                                hideZoomedImage();
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                });


                // Handle the form submission
                $('#editCategoryForm').on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: $(this).data('url'),
                        data: form.serialize(),
                        success: function(response) {
                            // Handle success response
                            console.log(response);
                            location.reload();
                        },
                        error: function(xhr) {
                            // Handle error response
                            console.log(xhr.responseText);
                        }
                    });
                });
            });
        </script>
    @endpush


@endsection
