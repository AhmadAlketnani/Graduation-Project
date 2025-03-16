@extends('dashboard.layout.app')

@section('content')
    {{-- <nav aria-label="breadcrumb" class="p-3 mb-3 rounded-1 d-flex justify-content-between "
         style="background: #d3d3d3 !important;">
        <h2 style="margin: 0 !important;">Permission</h2>
        <ol class="breadcrumb d-flex align-items-center" style="margin: 0 !important;">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('permissions.index') }}">Permissions</a></li>
            <li class="breadcrumb-item active">New Permission</li>

        </ol>
    </nav> --}}

    {{-- <nav aria-label="breadcrumb"
        class="m-auto mb-4 layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme ">
        <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center me-auto">
                <div class="nav-item d-flex align-items-center">
                    <h4 style="margin: 0 !important;">Permission</h4>

                </div>

            </div>



            <ol class="breadcrumb breadcrumb-custom-icon navbar-nav flex-row align-items-center ms-md-auto"
                style="margin: 0 !important;">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">Home</a>
                    <i class="breadcrumb-icon icon-base bx bx-chevron-right align-middle"></i>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">Library</a>
                    <i class="breadcrumb-icon icon-base bx bx-chevron-right align-middle"></i>
                </li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </div>
    </nav> --}}


    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Basic with Icons</h5>
                    <small class="text-body-secondary float-end">Merged input group</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('planes.store') }}">
                        @csrf
                        @method('post')
                        @include('dashboard.includes._errors')
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="icon-base bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        placeholder="John Doe" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Price</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i
                                            class="icon-base bx bx-buildings"></i></span>
                                    <input type="number" id="basic-icon-default-company" class="form-control"
                                        placeholder="200.00" aria-label="200.00"
                                        aria-describedby="basic-icon-default-company2" name="price">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Product Numbers</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="icon-base bx bx-envelope"></i></span>
                                    <input type="number" id="basic-icon-default-email" class="form-control"
                                        placeholder="30" aria-label="30" aria-describedby="basic-icon-default-email2" name="product_numbers">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Period</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="Period" class="input-group-text"><i
                                            class="icon-base bx bx-period"></i></span>
                                    <input type="number" id="Period" class="form-control phone-mask"
                                        placeholder="65"  name="period">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">Status</label>
                            <div class="col-sm-10" style="padding: 9.688px 13px !important;margin: 0 !important;">


                                <div class="form-check form-check-success" >
                                    <input class="form-check-input" type="checkbox" id="customCheckSuccess"
                                        checked="" name="status" value="{{ App\Models\Dashboard\Plane::STATUS_ACTIVE }}">
                                    <label class="form-check-label" for="customCheckSuccess">Active</label>
                                </div>



                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-label-success"><i class="bx bx-plus"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> {{-- end of card --}}
        </div>{{-- end of col --}}
    </div>{{-- end of row --}}
@endsection


{{-- <form method="post" action="{{ route('permissions.store') }}">
    @csrf
    @method('post')
    @include('dashboard.includes._errors')
    <div class="form-group mb-3">

        <label class="form-label">Name</label>
        <input class="form-control" type="text" placeholder="Permission Name" value="{{ old('name') }}"
            name="name">
    </div>
    <div class="form-group">
        <button class="btn btn-success" type="submit"><i class="bi bi-plus-square"></i> Add</button>
        <a href="{{ route('permissions.index') }}" class="btn btn-danger"><i class="bi bi-ban"></i> Cancel
        </a>
    </div>

</form> --}}
