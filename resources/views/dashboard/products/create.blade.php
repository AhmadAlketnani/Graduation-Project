@extends('dashboard.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Basic with Icons</h5>
                    <small class="text-body-secondary float-end">Merged input group</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @include('dashboard.includes._errors')
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.name_en') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="John Doe" name="name_en"
                                    value="{{ old('name_en') }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.name_ar') }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="John Doe" name="name_ar"
                                    value="{{ old('name_ar') }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.price') }}</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" min="1" placeholder="200.00"
                                    value="{{ old('price') }}" name="price">
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.quantity') }}</label>
                            <div class="col-sm-10">
                                <input type="number" min="1" class="form-control" value="{{ old('QTY') }}"
                                    name="QTY">

                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.description_en') }}</label>
                            <div class="col-sm-10">

                                <textarea name="description_en" class="form-control" placeholder="Product Description" rows="3">
                            {{ old('description_en') }}
                        </textarea>

                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.description_ar') }}</label>
                            <div class="col-sm-10">

                                <textarea name="description_ar" class="form-control" placeholder="Product Description" rows="3">
                            {{ old('description_ar') }}
                        </textarea>

                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.store') }}</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <select name="store_id" class="form-select">
                                        <option value="">{{ __('dashboard/table.store') }}</option>
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}"
                                                {{ old('service_id') == $store->id ? 'selected' : '' }}>
                                                {{ $store->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.category') }}</label>
                            <div class="col-sm-10">
                                <select name="categories[]" class="form-select" multiple>
                                    <option value="">{{ __('dashboard/table.categories') }}</option>
                                    @foreach ($categories as $Category)
                                        <option value="{{ $Category->id }}"
                                            {{ old('category_id') == $Category->id ? 'selected' : '' }}>
                                            {{ $Category->name_en }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.images') }}</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i
                                            class="icon-base ti ti-file"></i></span>
                                    <input type="file" class="form-control" name="images[]" multiple>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">{{ __('dashboard/table.status') }}</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-success">
                                    <input class="form-check-input" type="checkbox" id="customCheckSuccess"
                                        @checked(old('status') == App\Models\Dashboard\Product::STATUS_ACTIVE) name="status"
                                        value="{{ App\Models\Dashboard\Product::STATUS_ACTIVE }}">
                                    <label class="form-check-label" for="customCheckSuccess">{{ __('dashboard/table.active') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="demo-inline-spacing ">

                            <button type="submit" class="btn btn-success mr-1">
                                <i class="ti ti-device-floppy"></i>
                                {{ __('dashboard/table.save') }}
                            </button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-label-danger">
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
