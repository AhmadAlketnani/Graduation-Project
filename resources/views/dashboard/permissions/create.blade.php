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

    <nav aria-label="breadcrumb"
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
    </nav>


    <div class="row">
        <div class="col-12">
            <div class="card ">


                <form method="post" action="{{ route('permissions.store') }}">
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

                </form>

            </div> {{-- end of card --}}
        </div>{{-- end of col --}}
    </div>{{-- end of row --}}
@endsection
