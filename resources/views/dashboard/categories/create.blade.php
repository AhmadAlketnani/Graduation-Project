@extends('dashboard.layout.app')

@section('content')

    {{-- <nav aria-label="breadcrumb" class="p-3 mb-3 rounded-1 d-flex justify-content-between "
         style="background: #d3d3d3 !important;">
        <h2 style="margin: 0 !important;">categories</h2>
        <ol class="breadcrumb d-flex align-items-center" style="margin: 0 !important;">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item "><a href="{{ route('categories.index') }}">categories</a></li>
            <li class="breadcrumb-item active">New category</li>

        </ol>
    </nav> --}}
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Basic with Icons</h5>
                    <small class="text-body-secondary float-end">Merged input group</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('categories.store') }}">
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

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-label-success"><i class="bx bx-plus"></i>Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> {{-- end of card --}}
        </div>{{-- end of col --}}
    </div>{{-- end of row --}}

@endsection
