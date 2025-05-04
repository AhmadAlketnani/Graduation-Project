@extends('dashboard.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">{{ __('dashboard/table.edit_plane') }}</h5>
                    <small class="text-body-secondary float-end">{{ __('dashboard/table.update_plane_details') }}</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.planes.update', $plane->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('dashboard.includes._errors')
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.planes_name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="John Doe" name="name"
                                    value="{{ old('name', $plane->name) }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.price') }}</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" placeholder="200.00" name="price"
                                    value="{{ old('price', $plane->price) }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.product_numbers') }}</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" placeholder="30" name="product_numbers"
                                    value="{{ old('product_numbers', $plane->product_numbers) }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.period') }}</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" placeholder="6" name="period"
                                    value="{{ old('period', $plane->period) }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">{{ __('dashboard/table.planes_status') }}</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-success">
                                    <input class="form-check-input" type="checkbox" id="customCheckSuccess"
                                        @checked(old('status', $plane->status) == App\Models\Dashboard\Plane::STATUS_ACTIVE) name="status"
                                        value="{{ App\Models\Dashboard\Plane::STATUS_ACTIVE }}">
                                    <label class="form-check-label" for="customCheckSuccess">{{ __('dashboard/table.active') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="demo-inline-spacing ">

                            <button type="submit" class="btn btn-success mr-1">
                                <i class="ti ti-device-floppy"></i>
                                {{ __('dashboard/table.update') }}
                            </button>
                            <a href="{{ route('admin.planes.index') }}" class="btn btn-label-danger">
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
