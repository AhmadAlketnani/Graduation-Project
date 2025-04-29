@extends('dashboard.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Category</h5>
                    <small class="text-body-secondary float-end">Update category details</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('dashboard.includes._errors')
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">Category Name (EN)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Category Name (EN)" name="name_en"
                                    value="{{ old('name_en', $category->name_en) }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label">Category Name (AR)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Category Name (AR)" name="name_ar"
                                    value="{{ old('name_ar', $category->name_ar) }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Category Images</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i
                                            class="icon-base ti ti-file"></i></span>
                                    <input type="file" class="form-control" name="image" multiple>
                                </div>
                                @if ($category->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="100">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="demo-inline-spacing ">

                            <button type="submit" class="btn btn-success mr-1">
                                <i class="ti ti-device-floppy"></i>
                                Update
                            </button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-label-danger">
                                <i class="ti ti-ban"></i>
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div> {{-- end of card --}}
        </div>{{-- end of col --}}
    </div>{{-- end of row --}}
@endsection
