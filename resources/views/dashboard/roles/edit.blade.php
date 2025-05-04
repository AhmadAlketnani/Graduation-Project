@extends('dashboard.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Category</h5>
                    <small class="text-body-secondary float-end">Update Roles details</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.roles.update', $role->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('dashboard.includes._errors')
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.name_en') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="role Name (EN)" name="name_en"
                                    value="{{ old('name_en', $role->name_en) }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.name_ar') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="role Name (AR)" name="name_ar"
                                    value="{{ old('name_ar', $role->name_ar) }}">
                            </div>
                        </div>

                        <div class="demo-inline-spacing ">

                            <button type="submit" class="btn btn-success mr-1">
                                <i class="ti ti-device-floppy"></i>
                                {{ __('dashboard/table.update') }}
                            </button>
                            <a href="{{ route('admin.roles.index') }}" class="btn btn-label-danger">
                                <i class="ti ti-ban"></i>
                                {{ __('dashboard/table.cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div> {{-- end of card --}}
        </div>{{-- end of col --}}
    </div>{{-- end of row --}}
@endsection
