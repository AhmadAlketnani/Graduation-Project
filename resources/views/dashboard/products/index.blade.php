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
                                                data-bs-target="#addProductModal" data-bs-toggle="modal"><i
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
                                                    class="dt-column-title">Image</span>
                                            </th>
                                            <th data-dt-column="2" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Name</span>
                                            </th>
                                            <th data-dt-column="3" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Price</span>
                                            </th>
                                            <th data-dt-column="4" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">QTY</span>
                                            </th>
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Description</span>
                                            </th>
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Status</span>
                                            </th>
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Store_id</span>
                                            </th>
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Categorise_id</span>
                                            </th>
                                            <th data-dt-column="5" rowspan="1" colspan="1" tabindex="0"><span
                                                    class="dt-column-title">Created_at</span>
                                            </th>

                                            <th data-dt-column="7" rowspan="1" colspan="1" class="dt-orderable-none"
                                                aria-label="Actions"><span class="dt-column-title">Actions</span></th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body">
                                        @foreach ($products as $index => $product)
                                            <tr id="{{ $product->id }}">
                                                <td>{{ $index + 1 }}</td>
                                                <td class="text-heading" id="{{ $product->id }}-name">
                                                    <span class="fw-medium">{{ $product->name }}</span>
                                                </td>

                                                <td>
                                                    <img class="img-thumbnail" src="{{ $product->image_url }}"
                                                            alt="{{ $product->name }}" style="width: 50px; height: 50px;"
                                                            loading="lazy"
                                                            onmouseover="showZoomedImage('{{ $product->image_url }}')"
                                                            onmouseout="hideZoomedImage()">
                                                </td>
                                                <td>
                                                    <span class="text-truncate d-flex align-items-center text-heading"><i
                                                            class="icon-base bx bx-dollar text-success me-2"></i><span
                                                            id="{{ $product->id }}-price">{{ $product->price }}</span></span>
                                                </td>
                                                <td><span class="fw-medium"
                                                        id="{{ $product->id }}-QTY">{{ $product->QTY }}</span>
                                                </td>
                                                <td><span id="{{ $product->id }}-description">{{ $product->description }}</span> Month
                                                </td>
                                                <td id="{{ $product->id }}-status"><span
                                                        class="badge bg-label-{{ $product->status == App\Models\Dashboard\Product::STATUS_ACTIVE ? 'success' : 'danger' }}"
                                                        text-capitalized="">{{ $product->status }}</span>
                                                </td>
                                                {{-- <td id="{{ $product->id }}-store_id">{{ $product->store->name }}</td> --}}
                                                <td id="{{ $product->id }}-category_id">{{ $product->category->name }}</td>

                                                <td>{{ $product->created_at }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="#" data-bs-target="#editProductModal"
                                                            onclick="showEditModalProduct('{{ route('products.edit', $product->id) }}', '{{ route('products.update', $product->id) }}')"
                                                            data-bs-toggle="modal" class="btn-sm btn-icon text-warning "><i
                                                                class="icon-base bx bx-edit-alt icon-md"></i></a>

                                                        <form method="post"
                                                            action="{{ route('products.destroy', $product->id) }}"
                                                            style="display: inline-block;">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                class="btn-sm  btn-icon text-danger "><i
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
                            @if ($products->count() > 0)
                                {{ $products->appends(request()->query())->links() }}
                            @else
                                <h3 class="mt-3 text-center ">
                                    @if (request()->search)
                                        Sorry no product like this
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
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Add new Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Add role form -->
                    <form id="addProductForm" class="row mt-3 g-6" onsubmit="return false"
                        action="{{ route('products.store') }}">
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
                            <div class="col mb-0 mt-0 d-flex align-items-end ">
                                <div class="form-check form-check-success">
                                    <input class="form-check-input" type="checkbox" id="customCheckSuccess"
                                        checked="" name="status"
                                        value="{{ App\Models\Dashboard\Product::STATUS_ACTIVE }}">
                                    <label class="form-check-label" for="customCheckSuccess">Active</label>
                                </div>
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
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Add new Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- edit role form -->
                    <form id="editProductForm" class="row mt-3 g-6" data-url="" onsubmit="return false">
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
                                        value="{{ App\Models\Dashboard\Product::STATUS_ACTIVE }}">
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

@endsection
